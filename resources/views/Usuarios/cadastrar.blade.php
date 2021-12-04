@extends('_layout.default')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Cadastrar usuário</h3>

            <a href="{{route('usuarios.listar')}}" type="button" class="btn btn-sm btn-outline-primary">Voltar</a>
        </div>
        <form method="post" class="mt-4">
            @csrf
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input name="nome" type="email" class="form-control" id="nome" placeholder="Nome Sobrenome">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="identificacao" class="form-label">Identificação</label>
                        <input name="identificacao" type="text" class="form-control" id="identificacao" placeholder="123456789">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="email@gmail.com" />
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-select">
                            <option value="1">Responsável de Sala</option>
                            <option value="2">Usuário</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

