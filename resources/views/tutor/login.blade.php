@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="margin-bottom: 20px;">Tutor Login</h1>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email" style="font-weight: bold;">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" style="font-weight: bold;">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Login</button>
            </div>
        </form>
    </div>
@endsection
