@extends('layouts.app')
@section('title', 'Contatti')

@section('content')
    <h1 class="text-center text-4xl text-white">La tua lista dei congatti </h1>


    @livewire('contact-index')
@endsection
