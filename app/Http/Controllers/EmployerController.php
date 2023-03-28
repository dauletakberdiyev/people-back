<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $companies = Employer::latest()->take(10)->get()->toArray();
        $companies = Employer::join('employment', 'employment.id', '=', 'employer.employment')
            ->join('city', 'city.id', '=', 'employer.city')
            ->select(
                'employer.id',
                'employer.name',
                'employer.position',
                'employment.title_'.$request->input('lang').' as employment',
                'city.title_'.$request->input('lang').' as city',
                'employer.salary',
                'employer.position_desc',
                'employer.logo'
            )
            ->orderby('employer.created_at', 'desc')
            ->get()->toArray();

        return response()->json($companies);
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
        $logoPath = '';

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $path = public_path('uploads').'/'.$request->input('email');
            $logo->move($path, $logoName);
            $logoPath = $path.'/'.$logoName;
        }

        $employerInfo['name'] = $request->input('name');
        $employerInfo['web_site'] = $request->input('web_site');
        $employerInfo['position'] = $request->input('position');
        $employerInfo['employment'] = $request->input('employment');
        $employerInfo['city'] = $request->input('city');
        $employerInfo['salary'] = $request->input('salary');
        $employerInfo['experience'] = $request->input('experience');
        $employerInfo['position_desc'] = $request->input('position_desc');
        $employerInfo['first_last_name'] = $request->input('first_last_name');
        $employerInfo['phone'] = $request->input('phone');
        $employerInfo['email'] = $request->input('email');
        $employerInfo['logo'] = $logoPath;

        $employer = Employer::create($employerInfo);
        return response()->json([
            'message' => 'employer created successfully',
            'employer' => $employer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $company = Employer::join('employment', 'employment.id', '=', 'employer.employment')
            ->join('city', 'city.id', '=', 'employer.city')
            ->select(
                'employer.id',
                'employer.name',
                'employer.position',
                'employment.title_'.$request->input('lang').' as employment',
                'city.title_'.$request->input('lang').' as city',
                'employer.salary',
                'employer.position_desc',
                'employer.logo'
            )
            ->where('employer.id', $id)
            ->get()->toArray();

        return response()->json($company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
