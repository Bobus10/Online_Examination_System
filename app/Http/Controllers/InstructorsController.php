<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorsRequest;
use App\Models\Instructors;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.instructor.index', [
            'instructors' => Instructors::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorsRequest $request)
    {
        $instructors = new Instructors($request->validated());

        $instructors->save();

        return redirect()->route('instructors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.instructor.show', [
            'instructor' => Instructors::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.instructor.edit', [
            'instructor' => Instructors::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorsRequest $request, $id)
    {
        $instructor = Instructors::find($id);
        $instructor->fill($request->validated());

        $instructor->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructors::find($id);
        $instructor->delete();

        return redirect()->back();
    }
}
