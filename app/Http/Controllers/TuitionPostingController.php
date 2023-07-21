<?php

namespace App\Http\Controllers;

use App\Models\TuitionPosting;
use Illuminate\Http\Request;

class TuitionPostingController extends Controller
{
    public function index()
    {
        // Get all columns from the tuition_postings table
        $tuitionPostings = TuitionPosting::all();
    
        // Pass the tuition postings to the dashboard view
        return view('dashboard', compact('tuitionPostings'));
    }
    

    public function create()
    {
        // Show the form to create a new tuition posting
        return view('tuition.create');
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'subject' => 'required',
        'tuition_fee' => 'required|numeric',
        'max_students' => 'required|integer',
        'user_id' => 'required|exists:users,id',
    ]);

    $tuitionPosting = new TuitionPosting();
    $tuitionPosting->subject = $request->input('subject');
    $tuitionPosting->tuition_fee = $request->input('tuition_fee');
    $tuitionPosting->max_students = $request->input('max_students');
    $tuitionPosting->tutor_id = auth()->id();
    $tuitionPosting->user_id = $request->input('user_id'); // Assign the user_id from the request

    $tuitionPosting->save();

    return redirect()->route('dashboard')->with('success', 'Tuition posting created successfully');
}


    public function edit(TuitionPosting $tuitionPosting)
    {
        // Show the form to edit the tuition posting
        return view('tuition.edit', compact('tuitionPosting'));
    }

    public function update(Request $request, TuitionPosting $tuitionPosting)
    {
        // Validate the form data
        $this->validate($request, [
            'subject' => 'required',
            'tuition_fee' => 'required|numeric',
            'max_students' => 'required|integer',
        ]);

        // Update the tuition posting
        $tuitionPosting->update([
            'subject' => $request->input('subject'),
            'tuition_fee' => $request->input('tuition_fee'),
            'max_students' => $request->input('max_students'),
        ]);

        // Redirect to the tutor's dashboard or homepage
        return redirect()->route('dashboard')->with('success', 'Tuition posting updated successfully');
    }

    public function destroy(TuitionPosting $tuitionPosting)
{
    // Check if the logged-in user is the owner of the tuition posting
    if (auth()->id() != $tuitionPosting->tutor_id) {
        return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this tuition posting');
    }

    // Delete the tuition posting
    $tuitionPosting->delete();

    // Redirect to the dashboard with a success message
    return redirect()->route('dashboard')->with('success', 'Tuition posting deleted successfully');
}

public function viewListings(Request $request)
{
    $sort = $request->query('sort');

    // Get the tuition postings based on the selected sorting option
    if ($sort === 'latest') {
        $tuitionPostings = TuitionPosting::latest()->get();
    } elseif ($sort === 'tutor') {
        $tuitionPostings = TuitionPosting::orderBy('tutor_id')->get();
    } elseif ($sort === 'category') {
        $tuitionPostings = TuitionPosting::orderBy('category')->get();
    } else {
        $tuitionPostings = TuitionPosting::all();
    }

    return view('tuition.listings', compact('tuitionPostings'));
}

}
