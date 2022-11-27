<section class="min-h-[100vh] max-w-[100vw] pt-[calc(108px+50px)] bg-gray-400 overflow-x-scroll">

    <div class="absolute mx-auto w-fit top-[20px] left-[20px] lg:left-auto lg:top-[20px] lg:right-[20px]">
        <div class="min-w-[300px] bg-white rounded p-[20px]">
    
            <p class="cursor-pointer select-none text-xl font-bold text-gray-700 text-center transition duration-300 hover:text-blue-600" hx-get="{{ route('ajax.menu.show') }}" hx-target="#js-dialog">
                Menu
            </p>
    
        </div>
    </div>

    <div class="mx-auto w-fit mb-[50px] lg:mb-0">
        <div class="min-w-[300px] lg:min-w-[720px] bg-white rounded p-[20px]">
    
            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Editar Perfil
            </p>

            <form method="POST" action="{{ route('edit-profile') }}" enctype="multipart/form-data">
                <div class="flex flex-col lg:flex-row mt-8">
                    <div class="flex-1">
                        <div class="lg:pr-[20px] relative">
                            @if (isset($client->profile_picture))
                                <img id="js-profile-picture" class="block pointer-events-none aspect-square w-[100%]" src="{{ Voyager::image($client->profile_picture) }}" alt="Imagem de Perfil">
                            @else 
                                <img id="js-profile-picture" class="block cursor-pointer aspect-square w-[100%]" src="{{ asset('images/person.png') }}" alt="Imagem de Perfil">
                            @endif
                            <input id="js-image-input" type="file" name="image" class="cursor-pointer w-[100%] h-[100%] opacity-0 absolute top-0 left-0">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="lg:pl-[20px]">
                            
                                @csrf
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
                                <div class="mt-4 lg:mt-0 mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome</label>
                                    <div>
                                        @error('name')
                                            <span class="block text-red-600 mb-4" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <input type="text" name="name" value="{{ $client->name }}" required autofocus
                                        class="
                                        shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        >
                                    </div>
                                </div>
                                <div class="mb-8">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>
                                    <div>
                                        @error('email')
                                            <span class="block text-red-600 mb-4" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <input type="email" name="email" value="{{ $client->email }}" required autofocus
                                        class="
                                        shadow-bootstrap appearance-none border border-solid border-coolgray rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        >
                                    </div>
                                </div>
                                <div class="mb-8 w-fit cursor-pointer transition duration-300 bg-slate-500 hover:bg-gray-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" hx-get="{{ route('ajax.new-password.edit') }}" hx-target="#js-dialog">
                                    Trocar Senha
                                </div>
                                <div class="flex justify-center mb-4">
                                    <button type="submit" class="w-fit transition duration-300 bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Salvar
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        
        </div>
    </div>

   
</section>