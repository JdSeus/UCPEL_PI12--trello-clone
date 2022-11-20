
<form hx-post="{{ route('ajax.card.edit', $card->id) }}" hx-target="#js-response">
    @csrf
    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Editar Card
            </p>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="card_date">Data</label>
                <div>
                    @error('card_date')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <input required type="date" id="card_date" name="card_date" value="{{ $card->date }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="card_title">Título</label>
                <div>
                    @error('card_title')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="text" name="card_title" value="{{ $card->title }}" required autofocus
                    class="
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="card_description">Descrição</label>
                <div>
                    @error('card_description')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <textarea required name="card_description" placeholder="" value="{{ $card->description }}"
                    class="h-[120px]
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    ></textarea>
                </div>
            </div>

            <div class="text-center mb-4">
                <button type="submit" class="transition duration-300 bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Editar
                </button>
            </div>

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Comentários
            </p>

            <div class="mx-auto mt-4 block cursor-pointer text-white w-fit p-[5px] transition duration-300 bg-green-500 hover:bg-green-700" hx-get="{{ route('ajax.comment.create', ['card_id' => $card->id]) }}" hx-target="#js-dialog">
                Adicionar Comentário
            </div>

        </div>
    </div>
</form>