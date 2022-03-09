<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.index',['bookings'=>$bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms=Room::all();
        $customers=Customer::all();


        return view('booking.create',['rooms'=>$rooms,'customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'customer_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'room_id' => 'required',
            'total_adults' => 'required',
            'total_children' => 'required',


        ]);

        if($request->ref == 'front')
        {
            $sessionData=[
                'customer_id' => $request->customer_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'room_id' => $request->room_id,
                'total_adults' => $request->total_adults,
                'total_children' => $request->total_children,
                'price' => $request->roomprice,
                'ref' =>$request->ref

            ];
            session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51JqeYMC4CQn9TaQHy9jOwHAed3XT0dmu11FpXCEn5IE685wqohVvlJM8QTcxH4FtLxe6NfofiiQ2tQ8y8dbrTg1d00hOMTr7FQ');
            $session =\Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[

                    'price_data' =>[
                        'currency'=>'inr',
                        'product_data'=>[
                            'name'=>'Room',
                        ],
                        'unit_amount'=>$request->roomprice*100,
                    ],
                    'quantity' => 1,
                  ]],
                  'mode' => 'payment',
                  'success_url' =>'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                  'cancel_url' => 'http://localhost:8000/booking/fail',


            ]);
            return redirect($session->url);


        }
        else
        {
            $data = new Booking();

            $data->customer_id = $request->customer_id;
            $data->checkin_date = $request->checkin_date;
            $data->checkout_date = $request->checkout_date;
            $data->room_id = $request->room_id;
            $data->total_adults = $request->total_adults;
            $data->total_children = $request->total_children;


                if($request->ref == 'front')
                {
                    $data->ref='front';

                }
                else
                {
                    $data->ref='admin';

                }
                $data->save();
            return redirect(route('booking.create'))->with('success', 'Booking Created Successfully');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Booking::find($id);


        $data->delete();

        return redirect(route('booking.index'))->with('success', 'Booking deleted Successfully');
    }

    public function available_rooms(Request $request,$checkin_date)
    {
        $rooms=DB::SELECT("SELECT * FROM rooms where id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date )");

        $data=[];
        foreach($rooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];

        }
        return response()->json(['data'=>$data]);



    }
    public function front_booking()
    {

        return view('frontend.booking.create');
    }
    public function booking_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51JqeYMC4CQn9TaQHy9jOwHAed3XT0dmu11FpXCEn5IE685wqohVvlJM8QTcxH4FtLxe6NfofiiQ2tQ8y8dbrTg1d00hOMTr7FQ');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer =\Stripe\Customer::retrieve($session->customer);
      if($session->payment_status=='paid')
      {
        $data = new Booking();

        $data->customer_id = session('customer_id');
        $data->checkin_date = session('checkin_date');
        $data->checkout_date = session('checkout_date');
        $data->room_id = session('room_id');
        $data->total_adults = session('total_adults');
        $data->total_children = session('total_children');


            if(session('ref') == 'front')
            {
                $data->ref='front';

            }
            else
            {
                $data->ref='admin';

            }
            $data->save();
       return view('frontend.booking.bookingsuccess');

      }

    }
    public function booking_payment_fail(Request $request)
    {

       return view('frontend.booking.bookingfailure');
    }

}
