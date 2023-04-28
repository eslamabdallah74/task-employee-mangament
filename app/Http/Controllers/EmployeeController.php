<?php

namespace App\Http\Controllers;

use App\Http\Requests\addEmployeeRequest;
use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
