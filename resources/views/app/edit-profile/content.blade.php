<section class="min-h-[100vh] max-w-[100vw] pt-[calc(108px+50px)] bg-gray-400 overflow-x-scroll">

    <div class="mx-auto w-fit">
        <div class="min-w-[300px] lg:min-w-[720px] bg-white rounded p-[20px]">
    
            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Editar Perfil
            </p>

            <div class="flex mt-8">
                <div class="flex-1">
                    <div class="lg:pr-[20px]">
                        <div class="cursor-pointer aspect-square w-[100%] bg-red-500">
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="lg:pl-[20px]">
                        <form method="POST" action="#">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="client_name">Nome</label>
                                <div>
                                    @error('client_name')
                                        <span class="block text-red-600 mb-4" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="text" name="client_name" value="{{ $client->name }}" required autofocus
                                    class="
                                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    >
                                </div>
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="client_email">E-mail</label>
                                <div>
                                    @error('client_email')
                                        <span class="block text-red-600 mb-4" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="email" name="client_email" value="{{ $client->email }}" required autofocus
                                    class="
                                    shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    >
                                </div>
                            </div>
                            <div class="mb-8 w-fit cursor-pointer transition duration-300 bg-slate-500 hover:bg-gray-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" {{--hx-get="#" hx-target="#js-dialog"--}}>
                                Trocar Senha
                            </div>
                            <div class="flex justify-center mb-4">
                                <button type="submit" class="w-fit transition duration-300 bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

   
</section>