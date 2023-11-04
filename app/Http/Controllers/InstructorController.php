<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return view('admin.instructor.index', [
            'instructors' => Instructor::all(),
        ]);
    }

    public function create()
    {
        return view('admin.instructor.create');
    }

    public function store(InstructorRequest $request)
    {
        $instructors = new Instructor($request->validated());

        $instructors->save();

        return redirect()->route('instructors.index');
    }

    public function show($id)
    {
        return view('admin.instructor.show', [
            'instructor' => Instructor::find($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.instructor.edit', [
            'instructor' => Instructor::find($id),
        ]);
    }

    public function update(InstructorRequest $request, $id)
    {
        $instructor = Instructor::find($id);
        $instructor->fill($request->validated());

        $instructor->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();

        return redirect()->back();
    }
}
