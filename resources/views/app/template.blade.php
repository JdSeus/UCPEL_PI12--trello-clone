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
            <div id="js-dialog" hx-target="this">
            </div>
        </div>
    </div>
    <div class="ml-[5px]">


    <script src="https://unpkg.com/htmx.org@1.8.0"></script>
    <script>

        const modal = document.getElementById("js-modal")
        const dialog = document.getElementById("js-dialog")

        function makeModalExpired() {
            let parent = document.createElement("div");

            let block = document.createElement("div");
            block.classList =  "block p-[16px] bg-slate-300  m-auto";

            let title = document.createElement("div");
            title.classList = "font-bold mb-[20px] text-center text-red-400";
            title.innerText = "Página Expirada";

            let text = document.createElement("div");
            text.classList = "mb-[10px] text-center text-red-400";
            text.innerText = "Por favor, recarregue a página.";

            block.appendChild(title);
            block.appendChild(text);

            parent.appendChild(block);

            dialog.replaceChildren([]);
            dialog.appendChild(parent);

            modal.classList.add('active');
        }

        function makeModalNoPermission() {
            let parent = document.createElement("div");

            let block = document.createElement("div");
            block.classList =  "block p-[16px] bg-slate-300  m-auto";

            let title = document.createElement("div");
            title.classList = "font-bold mb-[20px] text-center text-red-400";
            title.innerText = "Sem Permissão";

            let text = document.createElement("div");
            text.classList = "mb-[10px] text-center text-red-400";
            text.innerText = "Você não ter permissão para fazer isso.";

            block.appendChild(title);
            block.appendChild(text);

            parent.appendChild(block);

            dialog.replaceChildren([]);
            dialog.appendChild(parent);

            modal.classList.add('active');
        }
    
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

        document.body.addEventListener('htmx:beforeOnLoad', function (evt) {
            if (evt.detail.xhr.status === 419) {
                makeModalExpired();
            }
            if (evt.detail.xhr.status === 403) {
                makeModalNoPermission();
            }
        });


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