<?php

namespace App\Http\Controllers;

use App\Http\Requests\YearbookRequest;
use App\Models\Classes;
use App\Models\DegreeCourse;
use App\Models\Yearbook;

class YearbookController extends Controller
{
    public function index($id)
    {
        $yearbooks = Yearbook::with('degreeCourse')->where('degree_course_id', $id)->withCount('classes')->get();

        return view('admin.yearbook.index', [
            'yearbooks' => $yearbooks,
        ]);
    }

    public function create($id)
    {
        $degreeCourse = DegreeCourse::find($id);

        return view('admin.yearbook.create', [
            'degreeCourse' => $degreeCourse,
        ]);
    }

    public function store(YearbookRequest $request, $id)
    {
        $yearbook = new Yearbook($request->validated());
        $yearbook->save();

        $class = new Classes([
            'label' => 'A',
            'yearbook_id' => $yearbook->id,
        ]);

        $class->save();

        $yearbook->with('degreeCourse')->find($id);
        $id = $yearbook->degreeCourse->id;

        return redirect()->route('yearbooks.index', $id);
    }

    public function show($id)
    {
        return view('admin.yearbook.show', []);
    }

    public function edit($id)
    {
        $yearbook = Yearbook::with('degreeCourse')->find($id);

        return view('admin.yearbook.edit', [
            'yearbook' => $yearbook,
        ]);
    }

    public function update(YearbookRequest $request, $id)
    {
        $yearbook = Yearbook::find($id);

        $yearbook->fill($request->validated());
        $yearbook->save();

        $yearbook->with('degreeCourse');
        $id = $yearbook->degreeCourse->id;

        return redirect()->route('yearbooks.index', $id);
    }

    public function destroy($id)
    {
        $yearbook = Yearbook::find($id);
        $yearbook->delete();

        return redirect()->back();
    }
}
