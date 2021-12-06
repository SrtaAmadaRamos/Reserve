<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    Bloco
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Salas
                </a>
            </li>
            @if(request()->session()->get('tipo') == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios.listar')}}">
                        <span data-feather="shopping-cart"></span>
                        Usuário
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>
