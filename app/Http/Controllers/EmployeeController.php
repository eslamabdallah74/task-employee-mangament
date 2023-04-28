<?php

namespace App\Http\Controllers;

use App\Http\Requests\addEmployeeRequest;
use App\Http\Requests\updateEmployeeRequest;
use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('shift')->orderBy('id','desc')->get();
        return response()->json($employees);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(addEmployeeRequest $request)
    {
        $image    = Image::addImage($request);
        $employee = new Employee([
            'name'              => $request['name'],
            'job_id'            => $request['job_id'],
            'image'             => $image,
            'starting_date'     => $request['hire_date'],
        ]);
        $employee->save();
        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateEmployeeRequest $request, $id)
    {

        $employee = Employee::findOrFail($id);

        $employee->name             = $request['name'];
        $employee->job_id           = $request['job_id'];
        $employee->starting_date    = $request['hire_date'];
        $employee->save();

        return response()->json([
            'message' => 'Employee updated successfully!',
            'employee' => $employee,
        ]);
    }

    public function updateImage(Request $request, $employeeId)
    {
        $employee = Employee::find($employeeId);
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $image = Image::editImage($request, $employee);
        $employee->image = $image;
        $employee->save();
        return response()->json(['message' => 'Employee image updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
