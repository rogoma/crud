<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') form-control-danger @enderror" value="{{ old('nombre') }}">
    @endif
</div>

<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="apellido" class="control-label">{{ 'Apellido' }}</label>
        <input class="form-control" name="apellido" type="text" id="apellido" value="{{ isset($empleado->apellido) ? $empleado->apellido : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" class="form-control @error('apellido') form-control-danger @enderror" value="{{ old('apellido') }}">
    @endif
</div>


<div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="correo" class="control-label">{{ 'Correo' }}</label>
        <input class="form-control" name="correo" type="text" id="correo" value="{{ isset($empleado->correo) ? $empleado->correo : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Correo</label>
        <input type="text" id="correo" name="correo" value="{{ old('correo') }}" class="form-control @error('correo') form-control-danger @enderror" value="{{ old('correo') }}">
    @endif
</div>

<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="cargo" class="control-label">{{ 'Cargo' }}</label>
            <select id="cargo" name="cargo_id" class="form-control">
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}"
                    @if ($cargo->id == old('cargo', $empleado->cargo_id)) selected @endif>{{ $cargo->descripcion }}</option>
                    {{-- value="{{ isset($empleado->correo) ? $empleado->correo : ''}}" > --}}
            @endforeach
        </select>
    @else
        <label for="cargo" class="control-label">{{ 'Cargo' }}</label>
        <select id="cargo" name="cargo_id" class="form-control">
            <option value="">--- Seleccionar Cargo ---</option>
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}" @if ($cargo->id == old('cargo')) selected @endif>{{$cargo->descripcion}}</option>
            @endforeach
        </select>
    @endif
</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="estado" class="control-label">{{ 'Estado' }}</label>
            <select id="estado" name="estado" class="form-control">
            {{-- $estados viene de EmpleadosController (1-actico 2-inactivo --}}
            @foreach ($estados as $valor => $nombre)
                <option value="{{ $valor }}" {{ $empleado->estado == $valor ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
    @else
        <label for="estado" class="control-label">{{ 'Estado' }}</label>
            <select id="estado" name="estado" class="form-control">
            {{-- $estados viene de EmpleadosController (1-actico 2-inactivo --}}
            <option value="">--- Seleccionar Estado ---</option>
            @foreach ($estados as $valor => $nombre)
                {{-- <option value="{{ $valor }}">{{ $nombre }}</option> --}}
                <option value="{{ $valor }}" @if ($valor == old('estado')) selected @endif>{{$nombre}}</option>
            @endforeach
        </select>
    @endif
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="file" id="foto" value="{{ isset($empleado->foto) ? $empleado->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
