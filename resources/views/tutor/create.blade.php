@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="margin-bottom: 20px;">Create Tuition Posting</h1>

        <form method="POST" action="{{ route('tuition.store') }}">
            @csrf

            <!-- Add form fields for subject, tuition fee, and max students -->
            <div class="form-group">
                <label for="subject" style="font-weight: bold;">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tuition_fee" style="font-weight: bold;">Tuition Fee:</label>
                <input type="number" name="tuition_fee" id="tuition_fee" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="max_students" style="font-weight: bold;">Max Students:</label>
                <input type="number" name="max_students" id="max_students" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Create</button>
            </div>
        </form>
    </div>
@endsection
