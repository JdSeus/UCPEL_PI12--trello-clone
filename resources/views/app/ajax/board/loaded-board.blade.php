<div class="max-w-[100vw] flex @if(isset($board->columns) && count($board->columns)) items-start @else items-center @endif ">
    @if(isset($board->columns) && count($board->columns))
        @foreach($board->columns as $column)
            <div class="relative ml-[20px] mr-[20px] w-fit">
                @if ($loop->first)
                    <div class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-0 bg-white">
                        @include('app.icons.arrow')
                    </div>
                @else
                    @if ($loop->last)
                        <div class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] left-0 bg-white">
                            @include('app.icons.arrow', ['class' => 'scale-x-[-1]'])
                        </div>
                    @else 
                        <div class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-[30px] bg-white">
                            @include('app.icons.arrow', ['class' => 'scale-x-[-1]'])
                        </div>
                        <div class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-[0] bg-white">
                            @include('app.icons.arrow')
                        </div>
                    @endif
                @endif

                <div class="min-w-[max(250px,calc(100vw-100px))] sm:min-w-[300px] bg-white rounded p-[20px]">
                    <div class="flex justify-between">
                        <p class="text-xl font-bold text-gray-700 text-center">
                            {{ $column->title }}
                        </p>
                        <div class="flex">
                            <a class="text-[12px] block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-yellow-500 hover:bg-yellow-700 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.column.edit', $column->id) }}" hx-target="#js-dialog">
                                Editar
                            </a>
                            <a class="text-[12px] ml-[5px] block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-red-500 hover:bg-red-700 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.column.remove', $column->id) }}" hx-target="#js-dialog">
                                Remover
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="ml-[20px] mr-[20px] w-fit">
            <div class="min-w-[max(250px,calc(100vw-100px))] sm:min-w-[300px] bg-white rounded p-[20px]">
                    
                <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.column.create', ['board_id' => $board->id]) }}" hx-target="#js-dialog">
                    Criar Coluna
                </div>

            </div>
        </div>
    @else
        <div class="mx-auto w-fit">
            <div class="min-w-[max(250px,calc(100vw-100px))] sm:min-w-[300px] bg-white rounded p-[20px]">
                    
                <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.column.create', ['board_id' => $board->id]) }}" hx-target="#js-dialog">
                    Criar Coluna
                </div>

            </div>
        </div>
    @endif
</div>