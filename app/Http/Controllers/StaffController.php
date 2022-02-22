<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.index',['staffs' =>Staff::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $department =Department::all();
     return view('staff.create',['departments' => $department]);
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
            'full_name' => 'required|max:255',
            'department_id' => 'required',
            'photo' => 'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required'




        ]);

        $image =$request->photo->store('staff');

        Staff::create([

            'full_name' => $request->full_name,
            'department_id' => $request->department_id,
            'photo' =>$image,
            'bio' => $request->bio,
            'salary_type' => $request->salary_type,
            'salary_amt' =>$request->salary_amt
        ]);


      return redirect(route('staff.create'))->with('success', 'Staff Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff=Staff::find($id);
        return view('staff.show',['staff'=>$staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department =Department::all();
        $staff =Staff::find($id);
        return view('staff.edit',['staff' => $staff, 'departments'=>$department]);
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
            'department_id' => 'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required'




        ]);
        $staff = Staff::find($id);

        if($request->hasFile('photo')){
            Storage::delete($staff->photo);


        $image =$request->file('photo')->store('staff');
        }
        else
        {
            $image = $request->prev_photo;
        }
$staff->full_name = $request->full_name;
$staff->department_id = $request->department_id;
$staff->photo = $image;
$staff->bio = $request->bio;
$staff->salary_type = $request->salary_type;
$staff->salary_amt = $request->salary_amt;
$staff->update();

return redirect(route('staff.index'))->with('success', 'Staff Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data=Staff::find($id);

        Storage::delete($data->photo);
        $data->delete();

        return redirect(route('staff.index'))->with('success', 'Staff deleted Successfully');

    }
    public function add_payment($staff_id)
    {
        return view('staffpayment.create',['staff_id'=>$staff_id]);

    }
    public function save_payment(Request $request,$staff_id)
    {
        StaffPayment::create([
            'staff_id'=>$staff_id,
            'amount' =>$request->amount,
            'payment_date'=>$request->payment_date


        ]);
        return redirect(route('staff.index'))->with('success', 'Staff Created Successfully');


    }
}
