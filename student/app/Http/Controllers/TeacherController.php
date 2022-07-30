<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $teachers = Teacher::latest()->paginate(5);


        return view('teachers.index', compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $teachers = Teacher::create($request->all());


        return redirect()->route('teachers.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {


        $teacher->delete();

        return redirect()->route('teachers.index')
            ->with('success', 'Product deleted successfully');
    }
}
