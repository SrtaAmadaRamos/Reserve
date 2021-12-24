@extends('_layout.default')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Cadastrar sala</h3>

            <a href="{{route('salas.listar')}}" type="button" class="btn btn-sm btn-outline-primary">Voltar</a>
        </div>
        <form method="post" class="mt-4">
            @csrf
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Nome da sala" required>
                        @foreach($errors->get('name') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="numero" class="form-label">Número</label>
                        <input name="numero" type="number" class="form-control" id="numero" placeholder="123456789" required>
                        @foreach($errors->get('numero') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="bloco_id" class="form-label">Bloco</label>
                        <select name="bloco_id" id="bloco_id" class="form-select" required>
                            @foreach($blocos as $bloco)
                                <option value="{{$bloco->id}}">{{$bloco->name}}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('bloco_id') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="responsavel_id" class="form-label">Responsável</label>
                        <select name="responsavel_id" id="responsavel_id" class="form-select" required>
                            @foreach($responsaveis as $responsvel)
                                <option value="{{$responsvel->id}}">{{$responsvel->nome}}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('responsavel_id') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection

