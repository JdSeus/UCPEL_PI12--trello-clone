<div class="max-w-[100vw] flex @if(isset($board->columns) && count($board->columns)) items-start @else items-center @endif ">
    @if(isset($board->columns) && count($board->columns))
        @foreach($board->columns as $column)
            <div class="relative ml-[20px] mr-[20px] w-fit">
                @if($loop->count > 1)
                    @if ($loop->first)
                        <div hx-target="#js-dialog" hx-get="{{ route('ajax.column.change-order', ['column_id' => $column->id, 'direction' => 'right']) }}"  class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-0 bg-white">
                            @include('app.icons.arrow')
                        </div>
                    @else
                        @if ($loop->last)
                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.column.change-order', ['column_id' => $column->id, 'direction' => 'left']) }}"  class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] left-0 bg-white">
                                @include('app.icons.arrow', ['class' => 'scale-x-[-1]'])
                            </div>
                        @else 
                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.column.change-order', ['column_id' => $column->id, 'direction' => 'left']) }}"  class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-[30px] bg-white">
                                @include('app.icons.arrow', ['class' => 'scale-x-[-1]'])
                            </div>
                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.column.change-order', ['column_id' => $column->id, 'direction' => 'right']) }}"  class="absolute cursor-pointer block w-[25px] h-[25px] p-[5px] rounded top-[-30px] right-[0] bg-white">
                                @include('app.icons.arrow')
                            </div>
                        @endif
                    @endif
                @endif

                <div class="min-w-[max(250px,calc(100vw-100px))] sm:min-w-[300px] bg-gray-200 rounded p-[20px]">

                    <div class="flex justify-between mb-8">
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

                    @if(isset($column->cards) && count($column->cards))
                        @foreach($column->cards as $card)
                        <div class="relative flex mb-4">
                            <div class="flex items-center">
                                @if($loop->count > 1)
                                    @if ($loop->first)
                                        <div hx-target="#js-dialog" hx-get="{{ route('ajax.card.change-order', ['card_id' => $card->id, 'direction' => 'bottom']) }}"  class="cursor-pointer block w-[25px] h-[25px] p-[5px] rounded bg-white">
                                            @include('app.icons.arrow', ['class' => 'rotate-[90deg]'])
                                        </div>
                                        <div class="w-[25px] h-[25px] ml-[5px] mr-[5px]"></div>
                                    @else
                                        @if ($loop->last)
                                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.card.change-order', ['card_id' => $card->id, 'direction' => 'up']) }}"  class="cursor-pointer block w-[25px] h-[25px] p-[5px] rounded bg-white">
                                                @include('app.icons.arrow', ['class' => 'scale-x-[-1] rotate-[90deg]'])
                                            </div>
                                            <div class="w-[25px] h-[25px] ml-[5px] mr-[5px]"></div>
                                        @else 
                                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.card.change-order', ['card_id' => $card->id, 'direction' => 'up']) }}"  class="cursor-pointer block w-[25px] h-[25px] p-[5px] rounded bg-white">
                                                @include('app.icons.arrow', ['class' => 'scale-x-[-1] rotate-[90deg]'])
                                            </div>
                                            <div hx-target="#js-dialog" hx-get="{{ route('ajax.card.change-order', ['card_id' => $card->id, 'direction' => 'down']) }}"  class="cursor-pointer ml-[5px] mr-[5px] block w-[25px] h-[25px] p-[5px] rounded bg-white">
                                                @include('app.icons.arrow', ['class' => 'rotate-[90deg]'])
                                            </div>
                                        @endif
                                    @endif
                                @else 
                                    <div class="w-[25px] h-[25px]"></div>
                                    <div class="w-[25px] h-[25px] ml-[5px] mr-[5px]"></div>
                                @endif
                            </div>
                            <div class="bg-white pl-[20px] pr-[5px] block p-[5px] w-[100%]">
                                <div class="flex justify-between">
                                    <p class="cursor-pointer font-bold transition duration-300 text-gray-700 hover:text-blue-500" hx-get="{{ route('ajax.card.edit', $card->id) }}" hx-target="#js-dialog">
                                        {{ $card->title }}
                                    </p>
                                    <div class="flex">
                                        <a class="flex items-center rounded-full justify-center w-[25px] h-[25px] text-[12px] ml-[5px] cursor-pointer text-white transition duration-300 bg-red-500 hover:bg-red-700 focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.card.remove', $card->id) }}" hx-target="#js-dialog">
                                            &#10005;
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        @endforeach
                    @endif

                    <div class="mx-auto mt-4 block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.card.create', ['column_id' => $column->id]) }}" hx-target="#js-dialog">
                        Criar Card
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