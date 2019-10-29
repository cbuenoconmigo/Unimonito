@extends('layouts.app')
@section('content')
    <h3>Formulario creación de productos</h3>
    <form action="{{route('productos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre producto" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="100.000" required>
            </div>
        </div>
        @if(isset($localidad))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tiene localidad?</label>
                <select class="form-control" name="idlocalidad" id="exampleFormControlSelect1" required>
                    @for($b = 0; $b < count($localidad); $b++)
                        <option value="{{$localidad[$b]['id']}}">{{$localidad[$b]['nombrelocalidad']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        @if(isset($tipo))
            <div class="form-group">
                <label for="exampleFormControlSelect1">¿Tipo producto?</label>
                <select class="form-control" name="idtipoproducto" id="exampleFormControlSelect1" required>
                    @for($a = 0; $a < count($tipo); $a++)
                        <option value="{{$tipo[$a]['id']}}">{{$tipo[$a]['nombre']}}</option>
                    @endfor
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="fechacompra">Fecha de compra</label>
            <input type="date" class="form-control" name="fechacompra" id="fechacompra" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="100000" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar">
        </div>
    </form>
@endsection
