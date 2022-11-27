
<form hx-post="{{ route('ajax.new-password.edit') }}" hx-target="#js-response">
    @csrf
    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">

            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Trocar Senha
            </p>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Nova Senha</label>
                <div>
                    @error('password')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="password" name="password" value="" required autofocus
                    class="
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirmar Nova Senha</label>
                <div>
                    @error('password_confirmation')
                        <span class="block text-red-600 mb-4" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="password" name="password_confirmation" value="" required autofocus
                    class="
                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    >
                </div>
            </div>

            <div class="flex justify-center mb-4">
                <button type="submit" class="w-fit transition duration-300 bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Trocar Senha
                </button>
                <div class="ml-[10px] w-fit cursor-pointer transition duration-300 bg-slate-500 hover:bg-gray-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="(document.getElementById('js-modal')).classList.remove('active');">
                    Cancelar
                </div>
            </div>

        </div>
    </div>
</form>