@extends('_layout.default')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Editar usuário</h3>

                <a href="{{route('usuarios.listar')}}" type="button" class="btn btn-sm btn-outline-primary">Voltar</a>
            </div>
            <form method="post">
                @csrf
                <input type="hidden" name="id" value="{{$usuario->id}}">
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" value="{{$usuario->nome}}" placeholder="Nome Sobrenome" required>
                        @foreach($errors->get('nome') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="identificacao" class="form-label">Identificação</label>
                        <input name="identificacao" type="text" class="form-control" id="identificacao" value="{{$usuario->identificacao}}" placeholder="123456789" required>
                        @foreach($errors->get('identificacao') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{$usuario->email}}" placeholder="email@gmail.com" required />
                        @foreach($errors->get('email') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-select" required>
                            <option value="2" {{$usuario->tipo == 2 ? 'selected' : ''}}>Usuário</option>
                            <option value="1" {{$usuario->tipo == 1 ? 'selected' : ''}}>Administrador</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
