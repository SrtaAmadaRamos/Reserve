@extends('_layout.default')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Editar bloco</h3>

                <a href="{{route('blocos.listar')}}" type="button" class="btn btn-sm btn-outline-primary">Voltar</a>
            </div>
            <form method="post" class="mt-4">
                @csrf
                <input type="hidden" name="id" value="{{$bloco->id}}">
                <div class="row">
                    <div class="mb-3 col-sm-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" value="{{$bloco->nome}}" placeholder="Nome do bloco" required>
                        @foreach($errors->get('nome') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="numero" class="form-label">Número</label>
                        <input name="numero" type="number" class="form-control" id="numero" value="{{$bloco->numero}}" placeholder="123456789" required>
                        @foreach($errors->get('numero') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-4">
                        <label for="coordenador" class="form-label">Coordenador</label>
                        <input name="coordenador" type="text" class="form-control" id="coordenador" value="{{$bloco->coordenador}}" placeholder="Nome do Coordenador"
                               required/>
                        @foreach($errors->get('coordenador') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection

