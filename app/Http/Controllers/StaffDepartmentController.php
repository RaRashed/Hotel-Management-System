<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class StaffDepartmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index',['departments' =>Department::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $department =Department::all();
     return view('department.create',['departments' => $department]);
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
            'title' => 'required|unique:departments|max:255',
            'detail' => 'required'


        ]);

        Department::create([

            'title' => $request->title,
            'detail' => $request->detail
        ]);


      return redirect(route('department.create'))->with('success', 'Department Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department=Department::find($id);
        return view('department.show',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $Department =Department::all();
        $department =Department::find($id);
        return view('department.edit',['department' => $department, 'department'=>$department]);
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

$department = Department::find($id);
$department->title = $request->title;
$department->detail= $request->detail;
$department->update();
return redirect(route('department.index'))->with('success', 'Department Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data=Department::find($id);
        $data->delete();

        return redirect(route('department.index'))->with('success', 'Department deleted Successfully');

    }
}
