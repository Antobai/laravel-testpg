<?php

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


Route::get('/', function () {
    $contacts = App\Contact::orderBy('name')->get();
    return view('welcome', ['contacts' => $contacts]);
});

Route::get('/contact/{id}', function ($id) {
    $contact = App\Contact::find($id);
    return view('contact', ['contact' => $contact]);
});

// Route::get('/admin', function () {
//     $contacts = App\Contact::orderBy('name')->get();
//     return view('admin', ['contacts' => $contacts]);
// })->middleware('auth');

Route::resource('contacts','ContactController')->middleware('auth');

Auth::routes();

