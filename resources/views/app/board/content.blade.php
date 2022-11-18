<section class="min-h-[100vh] flex @if(isset($board->columns) && count($board->columns)) items-start @else items-center @endif bg-gray-400 pt-[calc(108px+50px)]">

    <div class="absolute mx-auto w-fit top-[20px] left-[20px]">
        <div class="min-w-[300px] bg-white rounded p-[20px]">
    
            <p class="text-xl font-bold text-gray-700 text-center">
                Quadro: {{ $board->title }}
            </p>
    
        </div>
    </div>

    @if(isset($board->columns) && count($board->columns))
        @foreach($board->columns as $column)
            <div class="ml-[20px] mr-[20px] w-fit">
                <div class="min-w-[300px] bg-white rounded p-[20px]">
                    <p class="text-xl font-bold text-gray-700 text-center">
                        {{ $column->title }}
                    </p>
                </div>
            </div>
        @endforeach
        <div class="ml-[20px] mr-[20px] w-fit">
            <div class="min-w-[300px] bg-white rounded p-[20px]">
                    
                <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.column.create', ['board_id' => $board->id]) }}" hx-target="#js-dialog">
                    Criar Coluna
                </div>
        
            </div>
        </div>
    @else
        <div class="mx-auto w-fit">
            <div class="min-w-[300px] bg-white rounded p-[20px]">
                    
                <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.column.create', ['board_id' => $board->id]) }}" hx-target="#js-dialog">
                    Criar Coluna
                </div>
        
            </div>
        </div>
    @endif

</section>