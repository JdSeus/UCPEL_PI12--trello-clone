
<form hx-post="{{ route('ajax.board.edit', $board->id) }}" hx-target="#js-response">
    @csrf
    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Editar Quadro
            </p>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="board_title">Título</label>
                <div>
                    @error('board_title')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="text" name="board_title" value="{{ $board->title }}" required autofocus
                    class="
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                </div>
            </div>

            @if(isset($allClients) && count($allClients))
                @if(isset($board->clients) && count($board->clients))
                    <div class="mb-4">
                        @php
                            if (\Session::has('messages')) {
                                $messages = \Session::get('messages');
                            }
                        @endphp
                        @if (isset($messages) && empty($messages->all()) == false)
                            <div class="mb-4 mt-4 lg:mt-0">
                                @foreach ($messages->all() as $message)
                                <span class="block text-green-500 text-sm font-bold">
                                    {{ $message }}
                                </span>
                                @endforeach
                            </div>
                        @endif
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="board_clients[]">Clientes com Acesso</label>
                        <div>
                            @error('board_clients')
                                <span class="block text-red-600 mb-4" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            @foreach($allClients as $genericClient)
                                @if($genericClient->id == $loggedUser->id)
                                    <input checked type="checkbox" name="board_clients[]" value="{{ $loggedUser->id }}" class="hidden">
                                    <span class="block">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ ''.$genericClient->name.' - '.$genericClient->email }} <span class="font-bold">(você)</span>
                                    </span>
                                @else
                                    <input 
                                    @foreach($board->clients as $boardClient)
                                        @if($genericClient->id == $boardClient->id)
                                            checked
                                        @endif
                                    @endforeach
                                    type="checkbox" name="board_clients[]" value="{{ $genericClient->id }}">&nbsp;{{ ''.$genericClient->name.' - '.$genericClient->email }}<br/>
                                @endif
                            @endforeach
                            <span class="block mt-2">Obs: Você não pode remover acesso de si mesmo.</span>
                        </div>
                    </div>
                @endif
            @endif

            <div class="text-center mb-4">
                <button type="submit" class="transition duration-300 bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Editar
                </button>
            </div>

        </div>
    </div>
</form>