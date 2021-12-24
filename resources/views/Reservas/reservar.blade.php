@extends('_layout.default')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Reservar sala</h3>

                <a href="{{route('home')}}" type="button" class="btn btn-sm btn-outline-primary">Voltar</a>
            </div>
            <form method="post" class="mt-4">
                @csrf
                <div class="row">
                    <div class="mb-3 col-sm-13">
                    @if ($errors->get('comum'))
                        <div class="alert alert-danger validation-error alert-dismissible">
                            <ul>
                                @foreach ($errors->get('comum') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    </div>

                    <div class="mb-3 col-sm-6">
                        <label for="sala_id" class="form-label">Sala</label>
                        <select name="sala_id" id="sala_id" class="form-select" required>
                            @foreach($salas as $sala)
                                <option value="{{$sala->id}}" {{old('sala_id') == $sala->id ? 'selected' : ''}}>
                                    {{$sala->bloco->nome}} - {{$sala->nome}} (Responsável {{$sala->responsavel->nome}})
                                </option>
                            @endforeach
                        </select>
                        @foreach($errors->get('sala_id') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="data" class="form-label">Data</label>
                        <input name="data" type="date" class="form-control" id="data" value="{{old('data')}}" placeholder="Data para Reserva" required>
                        @foreach($errors->get('data') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="horarioEntrada" class="form-label">Horario Entrada</label>
                        <input name="horarioEntrada" type="time" class="form-control" id="horarioEntrada" value="{{old('horarioEntrada')}}" placeholder="123456789" required>
                        @foreach($errors->get('horarioEntrada') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>

                    <div class="mb-3 col-sm-6">
                        <label for="horarioSaida" class="form-label">Horario Saida</label>
                        <input name="horarioSaida" type="time" class="form-control" id="horarioSaida" value="{{old('horarioSaida')}}" placeholder="123456789" required>
                        @foreach($errors->get('horarioSaida') as $erro)
                            <span class="text-danger">{{$erro}}</span>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection

