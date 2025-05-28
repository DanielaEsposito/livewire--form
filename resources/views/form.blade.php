@extends('layouts.app')
@section('title', 'form')
@section('content')
    <h1 class="text-white text-center text-4xl">Compila il form</h1>
    @livewire('contact-form', ['id' => $id])
@endsection
