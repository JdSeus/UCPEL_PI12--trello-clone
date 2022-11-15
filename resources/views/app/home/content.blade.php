<section class="min-h-[100vh] flex items-center bg-gray-400">

    <div class="mx-auto w-fit">
        <div class="min-w-[300px] bg-white rounded p-[20px]">
    
            <p class="text-xl font-bold text-gray-700 text-center mb-4">
                Bem vindo, {{ Auth::user()->name }}!
            </p>
    
            <div class="mx-auto block cursor-pointer text-white w-fit p-[5px] bg-yellow-600 mb-4" hx-get="{{ route('ajax.board.my-boards') }}" hx-target="#js-dialog">
                Meus Quadros
            </div>
    
            <a class="block w-fit mx-auto transition duration-300 text-gray-700 hover:text-gray-700" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sair
            </a>

            <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
    
        </div>
    </div>

</section>