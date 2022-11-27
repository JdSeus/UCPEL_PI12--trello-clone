
@extends('app.template')

@php
    $SEOname = "Projeto Integrador VI - Editar Perfil";
@endphp

@section('title')
    {{ $SEOname }}
@endsection

@section('content')

    @include('app.general.header')

    <main class="edit-profile">
        @include('app.edit-profile.content')
    </main>

    @include('app.general.footer')

@endsection

@section('scripts')

@endsection