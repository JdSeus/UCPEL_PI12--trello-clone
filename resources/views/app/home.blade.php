
@extends('app.template')

@php
    $SEOname = "Projeto Integrador VI";
@endphp

@section('title')
    {{ $SEOname }}
@endsection

@section('content')

    @include('app.general.header')

    <main class="home">
        @include('app.home.content')
    </main>

    @include('app.general.footer')

@endsection

@section('scripts')

@endsection