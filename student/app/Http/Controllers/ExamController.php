<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Subject;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exams = $th = [];
        $data = Exam::with('term', 'subject', 'student')->get();
        if (count($data) > 0) {
            foreach ($data as $e) {
                $key = $e->student->name . '_' . $e->term->name;
                $subjects[] = $e->subject->name;

                $exams[$key]['id'] = $e->id;
                $exams[$key]['created On'] = Carbon::parse($e->updated_at)->format('M d Y g:i A');
                $exams[$key]['name'] = $e->student->name;
                $exams[$key]['term'] = $e->term->name;
                $exams[$key][$e->subject->name] = $e->mark;
                $total[$key][] = $e->mark;
            }

            foreach ($total as $key => $sum) {
                $exams[$key]['total'] = array_sum($sum);
            }
            $tdata = [];
            foreach ($exams as $a => $k) {
                foreach ($k as $i => $j) {
                    $tdata[$i][] = $j;
                }
            }
            $th = array_keys($tdata);
        }
        return view('exams.index')->with('tdata', $exams)->with('th', $th);
    }

    public function create()
    {

        $students = Student::get();
        $subjects = Subject::get();
        $terms = Term::get();
        return view('exams.create')->with('students', $students)->with('subjects', $subjects)->with('terms', $terms);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'sub_1' => 'required|min:0|max:50|numeric',
            'sub_2' => 'required|min:0|max:50|numeric',
            'sub_3' => 'required|min:0|max:50|numeric',

        ]);
        $marks =  [$request->sub_1, $request->sub_2, $request->sub_3];
        for ($i = 0; $i <= 2; $i++) {
            $exam = Exam::updateOrCreate(
                [
                    'student_id' => $request->student_id,
                    'term_id' => $request->term_id,
                    'subject_id' => $i + 1,

                ],
                ['mark' => $marks[$i]]

            );
            $exam->save();
        }




        return redirect()->route('exams.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
        $students = Student::get();
        $subjects = Subject::get();
        $terms = Term::get();
        $exam = Exam::find($id);
        if ($exam) {
            $term_id = $exam->term_id;
            $student_id = $exam->student_id;
            $examArray = Exam::where(['student_id' => $student_id, 'term_id' => $term_id])->get();
        }
        return view('exams.edit')->with('students', $students)
            ->with('subjects', $subjects)
            ->with('terms', $terms)
            ->with('student_id', $student_id)
            ->with('term_id', $term_id);
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
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $exam->update($request->all());

        return redirect()->route('exams.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exam = Exam::find($id);
        if ($exam) {
            $term_id = $exam->term_id;
            $student_id = $exam->student_id;
            $examArray = Exam::where(['student_id' => $student_id, 'term_id' => $term_id])->get();

            foreach ($examArray as $e) {
                $e->delete();
            }
        }
        return redirect()->route('exams.index')
            ->with('success', 'Product deleted successfully');
    }
}
