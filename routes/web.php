<?php

use App\Livewire\ContactForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//il ? indica che l'ID è opzionale, quindi se non viene passato, il componente creerà un nuovo contatto.
//creo una rotta get per la pagian form con la possibilità di passare o meno l'id se l'id non c'è verrà considerato null
Route::get('/form/{id?}', function ($id = null) {
    return view('form', ['id' => $id]);
})->name('form');
