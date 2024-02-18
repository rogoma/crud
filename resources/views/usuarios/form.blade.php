{{-- <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($usuario->nombre) ? $usuario->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($usuario->nombre) ? $usuario->nombre : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') form-control-danger @enderror" value="{{ old('nombre') }}">
    @endif
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
