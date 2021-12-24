@extends('_layout.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('usuarios.cadastrar')}}" type="button" class="btn btn-sm btn-outline-info">Novo Usuário</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Identificação</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->identificacao}}</td>
                    <td>{{$usuario->nome}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->tipo == 1 ? 'Administrado' : 'Usuário'}}</td>
                    <td class="text-center d-flex justify-content-center">
                        <a class="btn btn-sm btn-warning" href="{{route('usuarios.editar', ['id' => $usuario->id])}}">
                            Editar
                        </a>
                        <form method="post" action="{{route('usuarios.excluir', ['id' => $usuario->id])}}" onsubmit="if(!confirm('Realmente deseja apagar o usuário {{$usuario->nome}}?')) return false;">
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
            {!! $usuarios->links() !!}
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

