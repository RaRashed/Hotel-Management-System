<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
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
        //
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
            'total_children' => 'required'


        ]);
        Booking::create([

            'customer_id' => $request->customer_id,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'room_id' => $request->room_id,
            'total_adults' => $request->total_adults,
            'total_children' => $request->total_children
        ]);
        if($request->ref == 'front')
        {
            return redirect(url('booking'))->with('success', 'Booking Created Successfully');

        }
        else
        {
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
        //
    }

    public function available_rooms(Request $request,$checkin_date)
    {
        $rooms=DB::SELECT("SELECT * FROM rooms where id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date )");
        return response()->json(['data'=>$rooms]);

    }
    public function front_booking()
    {

        return view('frontend.booking.create');
    }
}
