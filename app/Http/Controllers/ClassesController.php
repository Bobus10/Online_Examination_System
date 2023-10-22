<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassesRequest;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Yearbook;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $classes = Classes::with(['yearbook.degreeCourse', 'students'])->where('yearbook_id', $id)->get();

        return view('admin.class.index', [
            'classes' => $classes,
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
    public function show($id)
    {
        $class = Classes::with(['yearbook.degreeCourse', 'students'])->find($id);

        return view('admin.class.show', [
            'class' => $class,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $class = Classes::with(['yearbook.degreeCourse', 'students'])->find($id);

        if(!$class) {
            return redirect()->back();
            // ->route('degree_courses.index');
        }

            // dd($class);
        // $studentsWithoutClass = $class->students->where('classes_id', NULL);
        $studentsInClass = $class->students;
            // dd($studentsInClass);
        $studentsWithoutClass = Student::whereNull('classes_id')->get();
            // dd($studentsWithoutClass);
        return view('admin.class.edit', [
            'class' => $class,
            'studentsInClass' => $studentsInClass,
            'studentsWithoutClass' => $studentsWithoutClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassesRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return redirect()->back();
    }

    public function extrusionStudent($studentId) {
        $student = Student::where('id', $studentId)->first();

        if( $student ) {
            $student->update( ['classes_id'=> null ] );
        }
        // dd($student);

        return redirect()->back();
    }
}
