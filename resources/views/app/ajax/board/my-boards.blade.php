<div class="mx-auto w-fit">
    <div class="min-w-[300px] bg-white rounded p-[20px]">

        <p class="text-xl font-bold text-gray-700 text-center mb-4">
            Meus Quadros
        </p>

        @if (count($boards) > 0)
            @foreach($boards as $board)
                <div class="mb-4">
                    <div class="p-[5px] flex items-baseline justify-between border-b border-t border-solid border-black">
                        <div class="block text-gray-700 text-sm font-bold mb-2 pr-[20px]">
                            {{ $board->title }}
                        </div>
                        <div class="flex">
                            <a class="block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-yellow-500 hover:bg-yellow-700 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.board.edit', $board->id) }}">
                                Editar
                            </a>
                            <a class="ml-[5px] block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-red-500 hover:bg-red-700 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.board.remove', $board->id) }}">
                                Remover
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else 
            <div class="mb-4">
                <span class="text-center block text-gray-700 text-sm font-bold mb-2">
                    Você ainda não possui nenhum quadro.
                </span>
            </div>
        @endif

        <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.board.create') }}" hx-target="#js-dialog">
            Criar Novo Quadro
        </div>

    </div>
</div>