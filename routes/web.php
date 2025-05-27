<?php

use App\Livewire\ContactForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacts/form', ContactForm::class)->name('contactCtreate');
Route::get('/contacts/form/{id}', ContactForm::class)->name('contactEdit');
