<section class="min-h-[100vh] max-w-[100vw] pt-[calc(108px+50px)] bg-gray-400 overflow-x-scroll">

    <div class="absolute mx-auto w-fit top-[20px] left-[20px]">
        <div class="min-w-[300px] bg-white rounded p-[20px]">
    
            <p class="text-xl font-bold text-gray-700 text-center">
                Quadro: {{ $board->title }}
            </p>
    
        </div>
    </div>

    <div id="js-boards-trigger" hx-get="{{ route('ajax.board.load-board', $board->id) }}" hx-target="#js-boards" hx-trigger="load, BoardListChanged from:body"></div>

    <div id="js-boards">
    </div>
   
</section>