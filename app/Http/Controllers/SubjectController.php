<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view("admin.subject.index", [
            'subjects' => Subject::all(),
        ]);
    }

    public function create()
    {
        return view("admin.subject.create", [
            'Instructor' => Instructor::all(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view("admin.subject.show", [
            'subject' => Subject::find($id),
        ]);
    }

    public function edit($id)
    {
        $subject = Subject::with('instructor')->find($id);
        $Instructor = $subject->instructor()->get();

        // dd($Instructor);
        return view("admin.subject.edit", [
            'subject' => $subject,
            'Instructor' => $Instructor,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);

        $subject->delete();

        return redirect()->back();
    }
}
