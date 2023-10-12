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
        // $ye = Yearbook::with('degreeCourse')->where('degree_course_id', $id);
        // $classes = $ye->with('classes')->withCount('student');

        // $yearbook = Yearbook::with(['degreeCourse', 'classes' => function ($query) {
        //     $query->withCount('student');
        // }])->where('degree_course_id', $id)->first();

        $yearbook = Yearbook::with(['degreeCourse', 'classes.student'])->find($id);

        $studentCounts = [];

        foreach ($yearbook->classes as $class) {
            $studentCounts[$class->id] = $class->student->count();
        }

        return view('admin.class.index', [
            'studentCounts' => $studentCounts,
            'class' => $yearbook,
            // 'a' => $classes,
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
    public function edit(Classes $classes)
    {
        //
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
