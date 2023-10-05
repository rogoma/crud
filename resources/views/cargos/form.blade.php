<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    {{-- <label for="descripcion" class="control-label">{{ 'descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($cargo->descripcion) ? $cargo->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!} --}}


    <label class="col-sm-2 col-form-label">Descripción</label>
    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control @error('descripcion') form-control-danger @enderror" value="{{ old('descripcion') }}">
    {{-- @error('descripcion')
        <div class="col-form-label">{{ $message }}</div>
    @enderror --}}

</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'estado' }}</label>
    <input class="form-control" name="estado" type="number" id="estado" value="{{ isset($cargo->estado) ? $cargo->estado : ''}}" >
    {{-- {!! $errors->first('estado', '<p class="help-block">:message</p>') !!} --}}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
