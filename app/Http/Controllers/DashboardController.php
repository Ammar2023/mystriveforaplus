<?php

namespace App\Http\Controllers;

use App\Models\TuitionPosting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the tuition postings for the logged-in user
        $tuitionPostings = auth()->user()->tuitionPostings;

        // Pass the tuition postings to the dashboard view
        return view('dashboard.index', compact('tuitionPostings'));
    }

    public function create()
    {
        // Show the form to create a new tuition posting
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'subject' => 'required',
            'tuition_fee' => 'required|numeric',
            'max_students' => 'required|integer',
        ]);

        // Create a new tuition posting for the logged-in user
        auth()->user()->tuitionPostings()->create([
            'subject' => $request->input('subject'),
            'tuition_fee' => $request->input('tuition_fee'),
            'max_students' => $request->input('max_students'),
        ]);

        // Redirect back to the dashboard
        return redirect()->route('dashboard')->with('success', 'Tuition posting created successfully');
    }

    public function destroy(TuitionPosting $tuitionPosting)
    {
        // Make sure the tuition posting belongs to the logged-in user
        if ($tuitionPosting->tutor_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized');
        }

        // Delete the tuition posting
        $tuitionPosting->delete();

        // Redirect back to the dashboard
        return redirect()->route('dashboard')->with('success', 'Tuition posting deleted successfully');
    }
}
