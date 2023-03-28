<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employment = Employment::all()->toArray();
        return response()->json($employment);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($lang)
    {
        $employment = Employment::select(
            'id',
            'title_'.$lang.' as title'
        )->get()->toArray();

        return response()->json($employment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employment $employment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employment $employment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employment $employment)
    {
        //
    }
}
