<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::active()->get();

        return response([
            "data" => $employees,
            "success" => true
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "designation" => "required",
            "image_url" => "required"
        ]);

        $employee = new Employee();

        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->image_url = $request->image_url;
        $employee->save();

        return response([
            "message" => "Employee Added Successfully",
            "status" => true
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);

        return response([
            "data" => $employee,
            "success" => true
        ],200);
    }

    public function status(Request $request){
        $request->validate([
            "id" => "required|exists:employees,id",
            "status" => "required|in:1,0"
        ]);

        Employee::find($request->id)->update(['status' => $request->status]);

        return response([
            "message" => "Employee Status Updated",
            "success" => true
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->image_url = $request->image_url;

        $employee->save();

        return response([
            "message" => "Employee Updated Successfully",
            "success" => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */


    // add soft delete
    public function destroy(string $id)
    {
        //
    }
}
