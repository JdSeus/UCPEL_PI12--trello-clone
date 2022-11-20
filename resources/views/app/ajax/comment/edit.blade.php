
<form hx-post="{{ route('ajax.comment.edit', ['comment_id' => $comment->id]) }}" hx-target="#js-response">
    @csrf
    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Editar Comentário
            </p>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comment_description">Descrição</label>
                <div>
                    @error('comment_description')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <textarea required name="comment_description"
                    class="h-[120px]
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >{{ $comment->description }}</textarea>
                </div>
            </div>

            <div class="text-center mb-4">
                <button type="submit" class="transition duration-300 bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Editar
                </button>
            </div>

        </div>
    </div>
</form>