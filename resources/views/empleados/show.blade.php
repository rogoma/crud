@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Empleado {{ $empleado->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/empleados') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/empleados/' . $empleado->id . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('empleados' . '/' . $empleado->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $empleado->id }}</td>
                                    </tr>
                                    <tr><th> Foto </th><td> {{ $empleado->foto }} </td></tr>
                                    <tr><th> Nombre </th><td> {{ $empleado->nombre }} </td></tr>
                                    <tr><th> Apellido </th><td> {{ $empleado->apellido }} </td></tr>
                                    <tr><th> Correo </th><td> {{ $empleado->correo }} </td></tr>
                                    <tr><th> Cargo </th><td> {{ $empleado->cargo->descripcion }} </td></tr>
                                    <tr><th> Estado </th>
                                        @if ($empleado->estado == 1)
                                            <td>ACTIVO</td>
                                        @else
                                            <td>INACTIVO</td>
                                        @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
