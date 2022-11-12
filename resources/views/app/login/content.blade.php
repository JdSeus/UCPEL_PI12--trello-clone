<section class="min-h-[100vh] flex items-center bg-gray-400">

    <div class="mx-auto w-fit mb-[10vh]">
        <div class="min-w-[300px] bg-white rounded p-[20px]">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="text-xl font-bold text-gray-700 text-center mb-4">
                    Projeto Integrador VI
                </div>

                <p class="text-gray-700 text-center mb-4">
                    Realizar Login
                </p>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Endereço de e-mail</label>
                    <div>
                        @error('email')
                            <span class="block text-red-600" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        class="
                        shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        >
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Senha</label>
                    <div>
                        @error('password')
                            <span class="block text-red-600" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="
                        shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        >
                    </div>
                </div>

                <div class="text-center text-sm mb-4">
                    <button type="submit" class="transition duration-300 bg-slate-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Entrar
                    </button>
                </div>

                <div class="text-center text-sm">
                    Sem conta? <a class="transition duration-300 text-slate-500 hover:text-gray-700" href="{{ route('register') }}">Registre-se</a>
                </div>

            </form>
        </div>
    </div>

</section>