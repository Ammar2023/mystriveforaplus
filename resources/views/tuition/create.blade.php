<!-- resources/views/tuition/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h1 style="margin-bottom: 20px;">Create Tuition Posting</h1></center>
        <form action="{{ route('postings.store') }}" method="POST" style="max-width: 400px; margin: 0 auto;">
            @csrf
            <div class="form-group">
                <label for="subject" style="margin-bottom: 5px;">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" style="padding: 10px;" required>
            </div>
            <div class="form-group">
                <label for="tuition_fee" style="margin-bottom: 5px;">Tuition Fee:</label>
                <input type="number" name="tuition_fee" id="tuition_fee" class="form-control" style="padding: 10px;" required>
            </div>
            <div class="form-group">
                <label for="max_students" style="margin-bottom: 5px;">Maximum Students:</label>
                <input type="number" name="max_students" id="max_students" class="form-control" style="padding: 10px;" required>
            </div>
            <div class="form-group">
                <label for="user_id" style="margin-bottom: 5px;">User ID:</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ auth()->id() }}" style="padding: 10px;" required>
            </div>

            <input type="hidden" name="tutor_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-primary" style="padding: 10px; width: 100%;">Create</button>
        </form>
    </div>
@endsection
