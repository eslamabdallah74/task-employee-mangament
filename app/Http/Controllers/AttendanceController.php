<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $attendances = $employee->attendances()->orderBy('datetime', 'desc')->get();

        return response()->json($attendances);
    }


    public function checkIn(Request $request, $employeeId)
    {

        $employee = Employee::find($employeeId);
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $lastAttendance = $employee->attendances()
            ->whereDate('datetime', Carbon::today())
            ->latest()
            ->first();
        if ($lastAttendance && $lastAttendance->status === 'in') {
            return response()->json(['message' => 'Employee has already checked in today'], 400);
        }

        $attendance = new Attendance();
        $attendance->employee_id = $employeeId;
        $attendance->datetime = now();
        $attendance->status = 'in';
        $attendance->save();

        return response()->json(['message' => 'Employee checked in successfully'], 200);
    }

    public function checkOut(Request $request, $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $lastAttendance = $employee->attendances()->latest()->first();

        if (!$lastAttendance || $lastAttendance->status === 'out') {
            return response()->json(['message' => 'Employee has not checked in'], 400);
        }

        $attendance = new Attendance();
        $attendance->employee_id = $employeeId;
        $attendance->status = 'out';
        $attendance->datetime = Carbon::now();
        $attendance->save();

        return response()->json(['message' => 'Employee checked out successfully']);
    }

}
