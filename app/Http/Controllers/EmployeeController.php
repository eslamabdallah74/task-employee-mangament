<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'job_id' => 'required|numeric',
            'image' => 'required|image|max:2048',
            'hire_date' => 'required',
        ]);

        // Save the employee's image to the storage directory
        $image = $validatedData['image']->store('public/images');
        $imageName = basename($image);
        // Create a new Employee model instance with the validated data
        $employee = new Employee([
            'name'              => $validatedData['name'],
            'job_id'            => $validatedData['job_id'],
            'image'             => $imageName,
            'starting_date'     => $validatedData['hire_date'],
        ]);

        // Save the employee to the database
        $employee->save();

        // Return the new employee as a JSON response
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
