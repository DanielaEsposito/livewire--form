<?php

use App\Livewire\ContactForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//il ? indica che l'ID è opzionale, quindi se non viene passato, il componente creerà un nuovo contatto.
Route::get('/contacts/form/{id?}', ContactForm::class)->name('form');
