
@extends('app.template')

@php
    $SEOname = "Projeto Integrador VI - Login";
@endphp

@section('title')
    {{ $SEOname }}
@endsection

@section('content')

    @include('app.general.header')

    <main class="login">
        @include('app.login.content')
    </main>

    @include('app.general.footer')

@endsection

@section('scripts')

@endsection