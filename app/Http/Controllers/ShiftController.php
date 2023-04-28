<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddShiftRequest;
use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function addShift(AddShiftRequest $request)
    {
        $employee = Employee::findOrFail($request->employee_id);
        if ($employee->shift) {
            $shift = $employee->shift;
            $shift->employee_id = null;
            $shift->save();
        }
        $shift = new Shift();
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->employee_id = $employee->id;
        $shift->save();



        return response()->json(['message' => 'Shift added successfully.']);
    }
}
