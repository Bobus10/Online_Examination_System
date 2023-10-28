<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassesRequest;
use App\Http\Requests\YearbookRequest;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Yearbook;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index($id)
    {
        $classes = Classes::with(['yearbook.degreeCourse', 'students'])->where('yearbook_id', $id)->orderBy('label')->get();

        return view('admin.class.index', [
            'classes' => $classes,
        ]);
    }

    public function create($id)
    {
        $yearbook = Yearbook::with(['degreeCourse','classes.students'])->find($id);
        $nextLetter = $this->getNextLetter($id);

        $studentsWithoutClass = Student::whereNull('classes_id')->get();


        return view('admin.class.create', [
            'yearbook' => $yearbook,
            'nextLetter' => $nextLetter,
            'studentsWithoutClass' => $studentsWithoutClass,
        ]);
    }

    // Create new class with next label latter, iterate on array of chosen students and change classes_id on new class id
    public function store($yearbookId, Request $request)
    {
        $yearbook = Yearbook::find($yearbookId);
        $chosenStudents = $request->input('chosenStudents');

        if (!$chosenStudents) {
            $chosenStudents = [];
        }
        session('chosenStudents', $chosenStudents);

        if (!$yearbook) {
            return redirect()->back()->with('error', 'Yearbook not found!');
        } else {
            $newClass = new Classes([
                    'label' => $this->getNextLetter($yearbookId),
                    'yearbook_id' => $yearbook->id,
                ]);

            $yearbook->classes()->save($newClass);

            foreach ($chosenStudents as $studentId) {
                $student = Student::find($studentId);
                if ($student) {
                    $student->update(['classes_id' => $newClass->id]);
                }
            }
        }

        return redirect()->route('class.index', $yearbook->id);
    }

    public function show($id)
    {
        $class = Classes::with(['yearbook.degreeCourse', 'students'])->find($id);

        return view('admin.class.show', [
            'class' => $class,
        ]);

    }

    public function edit($id)
    {
        $class = Classes::with(['yearbook.degreeCourse', 'students'])->find($id);

        if(!$class) {
            return redirect()->back();
        }

        $studentsInClass = $class->students;

        $studentsWithoutClass = Student::whereNull('classes_id')->get();

        return view('admin.class.edit', [
            'class' => $class,
            'studentsInClass' => $studentsInClass,
            'studentsWithoutClass' => $studentsWithoutClass,
        ]);
    }

    // updating students.classes_id if classes.id is different and excludes students who were not chosen
    public function update(Request $request, $id)
    {
        $class = Classes::with('students')->find($id);
        $classId = $class->id;

        $studentsInClass = $class->students->pluck('id')->toArray();

        $chosenStudents = $request->input('chosenStudents');

        if (!$chosenStudents) {
            $chosenStudents = [];
        }
        session('chosenStudents', $chosenStudents);

        $students = array_unique([...$studentsInClass, ...$chosenStudents]);

        foreach ($students as $studentId) {
            $student = Student::find($studentId);
            $studentClassId = $student->classes_id;

            if ($student) {
                if ($studentClassId != $classId) {
                    $student->update(['classes_id' => $classId]);
                } else if (!array_key_exists($studentId, $chosenStudents)) {
                    $student->update(['classes_id'=> NULL]);
                }
            }
        }

        return redirect()->route('class.edit', $class->id);
    }

    public function destroy($id)
    {
        return redirect()->back();
    }

    // Set label in alphabetic order, if delete class from middle fill in the gap | (A,B,D) fill up 'C'
    public function getNextLetter($yearbookId)
    {
        $yearbook = Yearbook::find($yearbookId);

        $labels = $yearbook->classes->pluck('label')->toArray();

        $alphabet = range('A','Z');
        $nextLetter = null;

        foreach ($alphabet as $letter) {
            if(!in_array($letter, $labels)) {
                $nextLetter = $letter;
                break;
            }
        }

        return $nextLetter;
    }
}
