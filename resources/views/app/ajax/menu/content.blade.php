<div class="mx-auto w-fit">
    <div class="min-w-[300px] bg-white rounded p-[20px]">

        <p class="text-xl font-bold text-gray-700 text-center mb-8">
            Menu
        </p>

        <a href="{{ route('home') }}" class="block w-fit font-bold text-gray-700 transition duration-300 hover:text-blue-500 cursor-pointer mb-4">
            Meus Quadros
        </a>

        <a href="{{ route('edit-profile') }}" class="block w-fit font-bold text-gray-700 transition duration-300 hover:text-blue-500 cursor-pointer mb-4">
            Editar Perfil
        </a>

        <a class="block w-fit font-bold text-gray-700 transition duration-300 hover:text-blue-500 cursor-pointer mb-4" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
        </a>

        <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

    </div>
</div>