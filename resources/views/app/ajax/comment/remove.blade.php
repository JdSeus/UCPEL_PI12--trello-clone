
<form hx-post="{{ route('ajax.comment.remove', $comment->id) }}" hx-target="#js-response">
    @csrf
    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Tem certeza que deseja remover este comentário?
            </p>

            <div class="flex justify-center mb-4">
                <button type="submit" class="w-fit transition duration-300 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Remover
                </button>

                <div class="ml-[10px] w-fit cursor-pointer transition duration-300 bg-slate-500 hover:bg-gray-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.card.edit', $comment->card->id) }}" hx-target="#js-dialog">
                    Cancelar
                </div>
            </div>

        </div>
    </div>
</form>