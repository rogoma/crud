<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="apellido" class="control-label">{{ 'Apellido' }}</label>
    <input class="form-control" name="apellido" type="text" id="apellido" value="{{ isset($empleado->apellido) ? $empleado->apellido : ''}}" >
    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    <label for="correo" class="control-label">{{ 'Correo' }}</label>
    <input class="form-control" name="correo" type="email" id="correo" value="{{ isset($empleado->correo) ? $empleado->correo : ''}}" >
    {!! $errors->first('correo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="cargo" class="control-label">{{ 'Cargo' }}</label>
        <select id="cargo" name="cargo" class="form-control">
            <option value="">--- Seleccionar Cargo ---</option>
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}" @if ($cargo->id == old('cargo')) selected @endif>{{$cargo->descripcion}}</option>
            @endforeach
        </select>
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="file" id="foto" value="{{ isset($empleado->foto) ? $empleado->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>

{{-- @if ($formMode === 'edit')
    <label for="descripcion" class="control-label">{{ 'descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($cargo->descripcion) ? $cargo->descripcion : ''}}" >
@else
    <label class="col-sm-2 col-form-label">Descripción</label>
    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control @error('descripcion') form-control-danger @enderror" value="{{ old('descripcion') }}">
@endif --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
