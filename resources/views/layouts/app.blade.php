@extends('layouts.layout')

@section('in_head')
    @vite('resources/sass/app.scss')
@endsection

@section('bodycontent')
    <x-header></x-header>

    <main>
        @yield('content')
    </main>

    <x-footer></x-footer>
@endsection


@section('end_body')
    @vite('resources/js/app.js')
@endsection
