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
        $employee = Employee::select(
            'first_name',
            'second_name',
            'gender',
            'experience',
            'position',
            'salary',
            'city',
            'phone',
            'email',
            'cv'
        )
            ->get()->toArray();

        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cvPath = '';

        if($request->hasFile('cv')){
            $cv = $request->file('cv');
            $cvName = time().'.'.$cv->getClientOriginalExtension();
            $path = public_path('uploads').'/'.$request->input('email');
            $cv->move($path, $cvName);
            $cvPath = $path.'/'.$cvName;
        }

        $employeeInfo['first_name'] = $request->input('first_name');
        $employeeInfo['second_name'] = $request->input('second_name');
        $employeeInfo['gender'] = $request->input('gender');
        $employeeInfo['experience'] = $request->input('experience');
        $employeeInfo['position'] = $request->input('position');
        $employeeInfo['salary'] = $request->input('salary');
        $employeeInfo['city'] = $request->input('city');
        $employeeInfo['phone'] = $request->input('phone');
        $employeeInfo['email'] = $request->input('email');
        $employeeInfo['cv'] = $cvPath;

        $employee = Employee::create($employeeInfo);
        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
