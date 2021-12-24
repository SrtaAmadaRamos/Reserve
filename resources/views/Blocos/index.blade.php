@extends('_layout.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blocos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('blocos.cadastrar')}}" type="button" class="btn btn-sm btn-outline-info">Novo Bloco</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Número</th>
                <th scope="col">Coordenador</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blocos as $bloco)
                <tr>
                    <td>{{$bloco->id}}</td>
                    <td>{{$bloco->nome}}</td>
                    <td>{{$bloco->numero}}</td>
                    <td>{{$bloco->coordenador}}</td>
                    <td class="text-center d-flex justify-content-center">
                        <a class="btn btn-sm btn-warning" href="{{route('blocos.editar', ['id' => $bloco->id])}}">
                            Editar
                        </a>
                        <form method="post" action="{{route('blocos.excluir', ['id' => $bloco->id])}}" onsubmit="if(!confirm('Realmente deseja apagar o bloco {{$bloco->name}}?')) return false;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" >
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $blocos->links() !!}
        </div>


        {{-- @if ($usuarios->lastPage() > 1)
            <ul class="pagination">
                <li class="{{ ($usuarios->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $usuarios->url(1) }}">Previous</a>
        </li>
        @for ($i = 1; $i <= $usuarios->lastPage(); $i++)
            <li class="{{ ($usuarios->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $usuarios->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($usuarios->currentPage() == $usuarios->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $usuarios->url($usuarios->currentPage()+1) }}" >Next</a>
        </li>
        </ul>
        @endif--}}
    </div>
@endsection

