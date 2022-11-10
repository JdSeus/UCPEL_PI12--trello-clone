<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>Title</title>
    @endif

    @hasSection('meta')
        @yield('meta')
    @else

    @endif

    @if (isset($onlyCSS) && $onlyCSS == true)
        @yield('onlyCSS')
    @else
        {{-- APP --}}
        <link rel="stylesheet" href="{{ isset(explode('?', mix('/css/app.css'))[1]) ? asset('/css/app.css?' . explode('?', mix('/css/app.css'))[1]) : asset('css/app.css') }}">
        @yield('styles')
    @endif    

</head>
<body>

    {{--  Content --}}
    @yield('content')
    {{--  End Content --}}

    @if (isset($onlyJS) && $onlyJS == true)
        @yield('onlyJS')
    @else
        {{-- APP --}}
        <script src="{{ isset(explode('?', mix('/js/app.js'))[1]) ? asset('/js/app.js?' . explode('?', mix('/js/app.js'))[1]) : asset('js/app.js') }}"></script>
        @yield('scripts')
    @endif  
    
</body>
</html>