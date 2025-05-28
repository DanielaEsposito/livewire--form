@extends('layouts.app')
@section('title', 'Contatti')

@section('content')
    <h1 class="text-center text-4xl text-white">La tua lista dei congatti </h1>
    <a class=" inline-block border-2 cursor-pointer text-white hover:bg-indigo-500 border-indigo-500 rounded-md mb-3 p-2"
        href="{{ route('form') }}">Aggiungi un
        nuovo contatto
    </a>

    @livewire('contact-index')
@endsection
