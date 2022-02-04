<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index',['customers' =>Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $customer =Customer::all();
     return view('customer.create',['customers' => $customer]);
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
            'full_name' => 'required|unique:customers|max:255',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required'




        ]);

        $image =$request->photo->store('customers');

        Customer::create([

            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => sha1($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' =>$image
        ]);


      return redirect(route('customer.create'))->with('success', 'customer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        return view('customer.show',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$customers =Customer::all();
        $customer =Customer::find($id);
        return view('customer.edit',['customer' => $customer]);
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
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required'




        ]);
        if($request->hasFile('photo')){


        $image =$request->photo->store('customers');
        }
        else
        {
            $image = $request->prev_photo;
        }

$customer = Customer::find($id);
$customer->full_name = $request->full_name;
$customer->email = $request->email;
$customer->password = sha1($request->password);
$customer->phone = $request->phone;
$customer->address = $request->address;
$customer->photo = $image;
$customer->update();
return redirect(route('customer.index'))->with('success', 'customer Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data=customer::find($id);
        $data->delete();

        return redirect(route('customer.index'))->with('success', 'customer deleted Successfully');

    }
}
