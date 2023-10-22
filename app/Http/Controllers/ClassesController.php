<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Yearbook;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $classes = Classes::with(['yearbook', 'students'])->where('yearbook_id', $id)->get();
        // $students = Classes::withCount('students');

        return view('admin.class.index', [
            'classes' => $classes,
            // 'students' => $students,
        ]);
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
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.class.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
