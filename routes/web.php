<?php
namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TuitionPostingController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Tutor Registration Routes
Route::get('/register', 'App\Http\Controllers\TutorController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\TutorController@register')->name('register.submit');

// Tutor Login Routes
Route::get('/login', 'App\Http\Controllers\TutorController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\TutorController@login')->name('login.submit');

// Tutor Posting Routes
Route::get('/postings/create', 'App\Http\Controllers\TuitionPostingController@create')->name('postings.create');
Route::post('/postings', 'App\Http\Controllers\TuitionPostingController@store')->name('postings.store');
Route::get('/postings/{id}/edit', 'App\Http\Controllers\TuitionPostingController@edit')->name('postings.edit');
Route::put('/postings/{id}', 'App\Http\Controllers\TuitionPostingController@update')->name('postings.update');
Route::delete('/postings/{id}', 'App\Http\Controllers\TuitionPostingController@destroy')->name('postings.destroy');
Route::get('/listings', 'App\Http\Controllers\TuitionPostingController@viewListings')->name('listings');




// // routes/web.php

// Route::get('/dashboard', 'App/Http/Controllers/DashboardController@index')->name('dashboard');
// Route::get('/postings/create', 'App/Http/Controllers/TuitionPostingController@create')->name('postings.create');
// Route::post('/postings', 'App/Http/Controllers/TuitionPostingController@store')->name('postings.store');
// Route::delete('/postings/{tuitionPosting}', 'App/Http/Controllers/TuitionPostingController@destroy')->name('postings.destroy');


Route::get('/dashboard', function () {
    // Retrieve the authenticated user
    $user = auth()->user();

    // Retrieve the tuition postings for the user
    $tuitionPostings = $user->tuitionPostings()->get();

    // Pass the data to the view and return the dashboard view
    return view('dashboard', compact('tuitionPostings'));
})->name('dashboard');



Route::get('/', function () {
    return view('welcome');
});
