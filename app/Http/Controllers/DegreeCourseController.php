<?php

namespace App\Http\Controllers;

use App\Http\Requests\DegreeCourseRequest;
use App\Models\DegreeCourse;

class DegreeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.degreeCourses.index', [
            'degreeCourses' => DegreeCourse::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.degreeCourses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DegreeCourseRequest $request)
    {
        $degreeCourse = new DegreeCourse($request->validated());

        $degreeCourse->save();

        return redirect()->route('degree_courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.yearbook.index', [
            'degreeCourse' => DegreeCourse::find($id)->with('yearbooks')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.degreeCourses.edit', [
            'degreeCourse' => DegreeCourse::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DegreeCourseRequest $request, $id)
    {
        $degreeCourse = DegreeCourse::find($id);
        $degreeCourse->fill($request->validated());

        $degreeCourse->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $degreeCourse = DegreeCourse::find($id);
        $degreeCourse->delete();

        return redirect()->back();
    }
}
