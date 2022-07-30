<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $terms = Term::latest()->paginate(5);
        return view('terms.index', compact('terms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('terms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $terms = Term::create($request->all());


        return redirect()->route('terms.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Term $term)
    {
        return view('terms.edit', compact('term'));
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
    public function update(Request $request, term $term)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $term->update($request->all());

        return redirect()->route('terms.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(term $term)
    {

        $exams = Exam::where('term_id', $term->id)->get();
        if (count($exams) > 0) {
            foreach ($exams as $exam) {
                $exam->delete();
            }
        }
        $term->delete();

        return redirect()->route('terms.index')
            ->with('success', 'Product deleted successfully');
    }
}
