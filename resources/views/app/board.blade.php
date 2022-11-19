
@extends('app.template')

@php
    $SEOname = "Projeto Integrador VI";
@endphp

@section('title')
    {{ $SEOname }}
@endsection

@section('content')

    @include('app.general.header')

    <main class="board">
        @include('app.board.content')
    </main>

    @include('app.general.footer')

@endsection

@section('beforeJS')
<script>

    htmx.trigger("#js-boards-trigger", "BoardListChanged");

</script>
@endsection