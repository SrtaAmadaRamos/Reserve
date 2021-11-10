@extends('_layout.auth')

@section('content')
    <main class="form-signin">
        <form method="post" >
            @csrf
            <img class="mb-4" src="" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            @if ($errors->any())
                <div class="alert alert-danger error-login">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
@endsection
