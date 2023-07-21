@extends('layouts.app')

@section('content')
    <div class="container">
        <center>
            <h1 style="margin-bottom: 20px;">Welcome to the Dashboard, {{ auth()->user()->name }}!</h1>
        </center>
        
        <center>
            <h2 style="margin-bottom: 20px;">Your Tuition Postings:</h2>
        </center>

        <div class="tuition-postings">
            @foreach ($tuitionPostings as $tuitionPosting)
                <div class="tuition-posting">
                    @foreach ($tuitionPosting->getAttributes() as $column => $value)
                        <p><strong>{{ $column }}:</strong> {{ $value }}</p>
                    @endforeach
                    <!-- Delete button for each tuition posting -->
                    <hr> <!-- Add a horizontal line after each row -->
                </div>
            @endforeach
        </div>

        <div class="dashboard-links">
            <a href="{{ route('postings.create') }}" class="btn btn-primary">Create New Tuition Posting</a>
            <a href="{{ route('listings') }}" class="btn btn-secondary">View Listings</a>
        </div>
    </div>
@endsection
