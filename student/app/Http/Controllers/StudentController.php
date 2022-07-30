<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);

        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $teachers = Teacher::get();

        return view('students.create')->with('teachers', $teachers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:students',
            'gender' => 'required|in:F,M',
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $students = Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id,
        ]);


        return redirect()->route('students.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Student $student)
    {
        $teachers = Teacher::get();
        return view('students.edit')->with('teachers', $teachers)->with('student', $student);
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
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'email'         => 'required|email|unique:students,email,' . $student->id,
            'gender' => 'required|in:F,M',
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $exams = Exam::where('student_id', $student->id)->get();
        if (count($exams) > 0) {
            foreach ($exams as $exam) {
                $exam->delete();
            }
        }
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'Product deleted successfully');
    }
}
