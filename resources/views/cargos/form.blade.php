<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">

    {{-- CÓDIGO ORIGINAL --}}
    {{-- <label for="descripcion" class="control-label">{{ 'descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($cargo->descripcion) ? $cargo->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!} --}}

    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="descripcion" class="control-label">{{ 'descripcion' }}</label>
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($cargo->descripcion) ? $cargo->descripcion : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control @error('descripcion') form-control-danger @enderror" value="{{ old('descripcion') }}">
        {{-- @error('descripcion')
            <div class="col-form-label">{{ $message }}</div>
        @enderror --}}
    @endif

</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    {{-- CÓDIGO ORIGINAL --}}
    {{-- <label for="estado" class="control-label">{{ 'estado' }}</label>
    <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($cargo->estado) ? $cargo->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!} --}}

    {{-- //PREGUNTA TIPO DE ACCIÓN PARA PODER MOSTRAR CAMPOS ACTUALES (OLD) Y NEW --}}
    @if ($formMode === 'edit')
        <label for="estado" class="control-label">{{ 'estado' }}</label>
        <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($cargo->estado) ? $cargo->estado : ''}}" >
    @else
        <label class="col-sm-2 col-form-label">Estado</label>
        <input type="text" id="estado" name="estado" value="{{ old('estado') }}" class="form-control @error('estado') form-control-danger @enderror" value="{{ old('estado') }}">
    @endif

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
