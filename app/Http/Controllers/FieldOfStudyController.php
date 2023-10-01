<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldOfStudyRequest;
use App\Models\FieldOfStudy;
use Illuminate\Http\Request;

class FieldOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fieldOfStudy.index', [
            'fieldOfStudies' => FieldOfStudy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fieldOfStudy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FieldOfStudyRequest $request)
    {
        $fieldOfStudy = new FieldOfStudy($request->validated());

        $fieldOfStudy->save();

        return redirect()->route('fos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.fieldOfStudy.show', [
            'fieldOfStudy' => FieldOfStudy::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.fieldOfStudy.edit', [
            'fieldOfStudy' => FieldOfStudy::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FieldOfStudyRequest $request, $id)
    {
        $fieldOfStudy = FieldOfStudy::find($id);
        $fieldOfStudy->fill($request->validated());

        $fieldOfStudy->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fieldOfStudy = FieldOfStudy::find($id);
        $fieldOfStudy->delete();

        return redirect()->back();
    }
}
