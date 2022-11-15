<div class="mx-auto w-fit">
    <div class="min-w-[300px] bg-white rounded p-[20px]">

        <p class="text-xl font-bold text-gray-700 text-center mb-4">
            Meus Quadros
        </p>

        @if (count($boards) > 0)
            @foreach($boards as $board)
                <div class="mb-4">
                    <div class="p-[5px] flex items-baseline justify-between border-b border-t border-solid border-black">
                        <div class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $board->title }}
                        </div>
                        <a class="block cursor-pointer text-white w-fit p-[5px] bg-yellow-600" hx-get="{{ route('ajax.board.edit', $board->id) }}">
                            Editar
                        </a>
                    </div>
                </div>
            @endforeach
        @else 
            <div class="mb-4">
                <span class="block text-gray-700 text-sm font-bold mb-2">
                    Você ainda não possui nenhum quadro.
                </span>
            </div>
        @endif

        <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] bg-green-600" hx-get="{{ route('ajax.board.create') }}" hx-target="#js-dialog">
            Criar Novo Quadro
        </div>

    </div>
</div>