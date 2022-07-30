<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $subjects = Subject::latest()->paginate(5);


        return view('subjects.index', compact('subjects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subjects = Subject::create($request->all());


        return redirect()->route('subjects.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
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
    public function update(Request $request, subject $subject)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {

        $exams = Exam::where('subject_id', $subject->id)->get();
        if (count($exams) > 0) {
            foreach ($exams as $exam) {
                $exam->delete();
            }
        }
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Product deleted successfully');
    }
}
