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

    <div id="js-modal" class="modal-container">
        <div class="modal-item relative">
                <div class="absolute cursor-pointer text-[30px] leading-[1] top-0 right-[5px]" onclick="this.parentElement.parentElement.classList.remove('active');">
                    ×
                </div>
            <div id="js-dialog" hx-target="this"></div>
        </div>
    </div>
    <div class="ml-[5px]">


    <script src="https://unpkg.com/htmx.org@1.8.0"></script>
    <script>

        const modal = document.getElementById("js-modal")
    
        htmx.on("htmx:afterSwap", (e) => {
            // Response targeting #js-dialog => show the modal
            if (e.detail.target.id == "js-dialog") {
                modal.classList.add('active');
            }
        })
    
        htmx.on("htmx:beforeSwap", (e) => {
            // Empty response targeting #js-dialog => hide the modal
            if (e.detail.target.id == "js-dialog" && !e.detail.xhr.response) {
                modal.classList.remove('active');
                e.detail.shouldSwap = false
            }
        })
    </script>

    @if (isset($onlyJS) && $onlyJS == true)
        @yield('onlyJS')
    @else
        {{-- APP --}}
        <script src="{{ isset(explode('?', mix('/js/app.js'))[1]) ? asset('/js/app.js?' . explode('?', mix('/js/app.js'))[1]) : asset('js/app.js') }}"></script>
        @yield('scripts')
    @endif  
    
</body>
</html>