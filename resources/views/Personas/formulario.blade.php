@extends('vistaBootstrap')
@section('containerMain')
<div class="container">
    <form action="{{route('guardarPersona')}}" method="POST">
        {{csrf_field()}}
        <fieldset>
            <legend>Formulario</legend>
            
            <div class="form-group row mt-3">
                <label for="name" class="col-sm-2 col-form-label">Nombres: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" >
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" >
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="ciudad" class="col-form-label col-sm-2">Ciudad: </label>
                <div class="col-sm-10">
                    <select class="form-control" id="ciudad" name="ciudad">
                        <option name="cbb" id="cbb">Cocha</option>
                        <option name="pt" id="pt">Potosi</option>
                        <option name="lp" id="lp">La Paz</option>
                        <option name="sc" id="sc">Santa</option>
                        <option name="tr" id="tr">Tarija</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </fieldset>
    </form>
</div>

@stop