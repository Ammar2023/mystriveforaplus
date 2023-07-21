@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="margin-bottom: 20px;">Tuition Postings Listings</h1>

        <div class="sorting-options">
            <p style="margin-bottom: 10px; font-weight: bold;">Sort by:</p>
            <a href="{{ route('listings') }}" style="margin-right: 10px;">All</a> |
            <a href="{{ route('listings', ['sort' => 'latest']) }}" style="margin-right: 10px;">Latest</a> |
            <a href="{{ route('listings', ['sort' => 'tutor']) }}" style="margin-right: 10px;">Tutor</a> |
        </div>

        <ul style="list-style: none; padding: 0;">
            @foreach ($tuitionPostings as $tuitionPosting)
                <li style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
                    <p style="margin: 0; font-weight: bold;">Subject: {{ $tuitionPosting->subject }}</p>
                    <p style="margin: 0;">Tuition Fee: {{ $tuitionPosting->tuition_fee }}</p>
                    <p style="margin: 0;">Max Students: {{ $tuitionPosting->max_students }}</p>
                    <p style="margin: 0;">Tutor: {{ $tuitionPosting->tutor->name }}</p>
                    <p style="margin: 0;">Category: {{ $tuitionPosting->category }}</p>
                </li>
            @endforeach
        </ul>

        <!-- Link to go to the dashboard -->
        <a href="{{ route('dashboard') }}" style="display: block; margin-top: 20px;">Go to Dashboard</a>
    </div>
@endsection
