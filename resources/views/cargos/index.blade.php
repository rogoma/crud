@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-12 col-lg-12 col-sm-6">
                <div class="card">
                    <div class="card-header">Cargos</div>
                    <div class="card-body">
                        <a href="{{ url('/cargos/create') }}" class="btn btn-success btn-sm" title="Add New Cargo">
                            <i class="fa fa-plus" aria-hidden="true"></i>Nuevo
                        </a>

                        <form method="GET" action="{{ url('/cargos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Descripción</th><th>Estado</th><th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- <p>{{ $message }}</p> --}}

                                @if(session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                @endif

                                @foreach($cargos as $item)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td>
                                            <a href="{{ url('/cargos/' . $item->id) }}" title="View Cargo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/cargos/' . $item->id . '/edit') }}" title="Edit Cargo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/cargos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Cargo" onclick="return confirm(&quot;Confirmar borrado?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                            
                            <!-- Muestra la paginación de DataTables -->
                            {{-- <div class="pagination-wrapper"> {!! $cargos->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                            {{ $cargos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script> --}}
