@extends('_layout.default')

@section('content')
    @if (session('mensagem'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session('mensagem') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Salas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('salas.cadastrar')}}" type="button" class="btn btn-sm btn-outline-info">Nova Sala</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Bloco</th>
                    <th scope="col">Responsável</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salas as $sala)
                <tr>
                    <td>{{$sala->id}}</td>
                    <td>{{$sala->name}}</td>
                    <td>{{$sala->bloco->name}}</td>
                    <td>{{$sala->responsavel->nome}}</td>
                    <td class="text-center d-flex justify-content-center">
                        <a class="btn btn-sm btn-warning" href="{{route('salas.editar', ['id' => $sala->id])}}">
                            Editar
                        </a>
                        <form method="post" action="{{route('salas.excluir', ['id' => $sala->id])}}" onsubmit="if(!confirm('Realmente deseja apagar a sala {{$sala->name}}?')) return false;">
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

