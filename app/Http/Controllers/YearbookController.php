<?php

namespace App\Http\Controllers;

use App\Models\Yearbook;
use Illuminate\Http\Request;

class YearbookController extends Controller
{
    public function index()
    {
        $yearbooks = Yearbook::with([
            'degreeCourse',
            'classes' => function ($q) {
                $q->withCount('students');
            }
                ])->get();

        return view('admin.yearbook.index', [
            'yearbooks' => $yearbooks,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin.yearbook.show', [
        ]);
    }

    public function edit(Yearbook $yearbook)
    {
        //
    }

    public function update(Request $request, Yearbook $yearbook)
    {
        //
    }

    public function destroy(Yearbook $yearbook)
    {
        //
    }
}
