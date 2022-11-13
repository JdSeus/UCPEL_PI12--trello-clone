<section class="h-[100vh] flex items-center">

    

    <div class="mx-auto w-fit mb-[10vh]">
        {{-- 
        <form class="block text-white w-fit p-[5px] bg-yellow-600" hx-post="{{ route('ajax.simple-form') }}" hx-target="#js-dialog">
            @csrf
            <button type="submit">Abrir Form</button>
        </form>
        --}}
        <div class="block cursor-pointer text-white w-fit p-[5px] bg-yellow-600" hx-get="{{ route('ajax.board.create') }}" hx-target="#js-dialog">
            Criar Quadro
        </div>
        <p class="text-[32px]  font-bold">
            HOME
        </p>
        <div>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</section>