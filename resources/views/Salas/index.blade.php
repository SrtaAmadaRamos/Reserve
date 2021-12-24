@extends('_layout.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Salas</h1>
        @hasRole('admin')
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('salas.cadastrar')}}" type="button" class="btn btn-sm btn-outline-info">Nova Sala</a>
            </div>
        </div>
        @endhasRole
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Bloco</th>
                    <th scope="col">Responsável</th>
                    @hasRole('admin')
                    <th scope="col" class="text-center">Ações</th>
                    @endhasRole
                </tr>
            </thead>
            <tbody>
                @foreach($salas as $sala)
                <tr>
                    <td>{{$sala->id}}</td>
                    <td>{{$sala->nome}}</td>
                    <td>{{$sala->bloco->nome}}</td>
                    <td>{{$sala->responsavel->nome}}</td>
                    @hasRole('admin')
                    <td class="text-center d-flex justify-content-center">
                        <a class="btn btn-sm btn-warning" href="{{route('salas.editar', ['id' => $sala->id])}}">
                            Editar
                        </a>
                        &nbsp;
                        <form method="post" action="{{route('salas.excluir', ['id' => $sala->id])}}" onsubmit="if(!confirm('Realmente deseja apagar a sala {{$sala->name}}?')) return false;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" >
                                Excluir
                            </button>
                        </form>
                    </td>
                    @endhasRole
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $salas->links() !!}
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

