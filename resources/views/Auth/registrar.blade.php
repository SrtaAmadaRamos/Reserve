@extends('_layout.auth')

@section('content')
    <main class="form-signin">
        <form method="post" >
            @csrf
            <img class="mb-4" src="" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Registrar</h1>

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
                <input type="text" name="nome" class="form-control" id="nome" placeholder="name@example.com" required="required" value="{{ old('nome') }}">
                <label for="nome">Nome <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required="required" value="{{ old('email') }}">
                <label for="floatingInput">Email <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating">
                <input type="text" name="identificacao" class="form-control" id="identificacao" placeholder="name@example.com" required="required" value="{{ old('identificacao') }}">
                <label for="identificacao">Identificação <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating">
                <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha" required="required" value="{{ old('senha') }}">
                <label for="floatingPassword">Senha <span class="text-danger">*</span></label>
            </div>
            <div class="form-floating">
                <input type="password" name="senha_confirmation " class="form-control" id="senha_confirmation " placeholder="Confirme sua" required="required">
                <label for="senha_confirmation ">Confirme a senha <span class="text-danger">*</span></label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-3 mt-3" type="submit">Registrar-se</button>
            <a href="{{route('login')}}">Já tem cadastro? Faça login aqui!</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
@endsection
