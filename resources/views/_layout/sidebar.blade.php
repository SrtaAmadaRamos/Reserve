<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @hasRole('admin')
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('blocos.listar')}}">
                    <span data-feather="home"></span>
                    Bloco
                </a>
            </li>
            @endhasRole
            <li class="nav-item">
                <a class="nav-link" href="{{route('salas.listar')}}">
                    <span data-feather="file"></span>
                    Salas
                </a>
            </li>
            @hasRole('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios.listar')}}">
                        <span data-feather="shopping-cart"></span>
                        Usuário
                    </a>
                </li>
            @endhasRole
        </ul>

    </div>
</nav>
