
@extends('app.template')

@php
    $SEOname = "Projeto Integrador VI - Registrar";
@endphp

@section('title')
    {{ $SEOname }}
@endsection

@section('content')

    @include('app.general.header')

    <main class="register">
        @include('app.register.content')
    </main>

    @include('app.general.footer')

@endsection

@section('scripts')

@endsection