<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employee = Employee::join('city', 'city.id', '=', 'employees.city')
            ->join('gender', 'gender.id', '=', 'employees.gender')
            ->select(
                'employees.id',
                'employees.first_name',
                'employees.second_name',
                'gender.title_'.$request->input('lang').' as gender',
                'employees.experience',
                'employees.position',
                'employees.salary',
                'city.title_'.$request->input('lang').' as city',
                'employees.phone',
                'employees.email',
                'employees.cv'
            )
            ->orderby('employees.id')
            ->paginate(10);

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
    public function destroy($id)
    {
        try {
            Employee::where('id', $id)->delete();
        }
        catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'message' => 'employee deleted successfully',
        ]);
    }
}
