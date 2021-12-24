@extends('_layout.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Reservas de sala</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-info" href="{{route('reservas.reservar')}}">Adicionar reserva</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Sala</th>
                <th scope="col">Bloco</th>
                <th scope="col">Responsável</th>
                <th scope="col">Reservado por</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td> {{$reserva->data->format('d/m/Y')}}</td>
                    <td>{{$reserva->getHorarioEntradaFormatado()}} - {{$reserva->getHorarioSaidaFormatado()}}</td>
                    <td>{{$reserva->sala->nome}}</td>
                    <td>{{$reserva->sala->bloco->nome}}</td>
                    <td>{{$reserva->sala->responsavel->nome}}</td>
                    <td>{{$reserva->solicitante->nome}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
