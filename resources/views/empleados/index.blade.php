@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Empleados</div>
                    <div class="card-body">
                        <a href="{{ url('/empleados/create') }}" class="btn btn-success btn-sm" title="Agregar nuevo Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                        </a>

                        <form method="GET" action="{{ url('/empleados') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Foto</th><th>Nombre y Apellido</th><th>Correo</th><th>Cargo</th><th>Estado</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleados as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->foto }}</td>
                                        <td>{{ $item->nombre ." ". $item->apellido }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>{{ $item->cargo->descripcion }}</td>

                                        @if ($item->estado == 1)
                                            <td>ACTIVO</td>
                                        @else
                                            <td>INACTIVO</td>
                                        @endif

                                        {{-- <td>{{ $item->estado }}</td> --}}

                                        <td>
                                            <a href="{{ url('/empleados/' . $item->id) }}" title="View Empleado"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/empleados/' . $item->id . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/empleados' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pagination-wrapper"> {!! $empleados->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                            {{ $empleados->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
