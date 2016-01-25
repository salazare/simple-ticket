@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Generar ticket de soporte
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    {{--@include('common.errors')--}}

                    <form action="/tickets" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Título</label>
                            <div class="col-sm-9">
                                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}"
                                       placeholder="titulo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion" class="form-control" placeholder="Breve descripción del problema">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Categoría</label>
                            <div class="col-sm-9">
                                <select name="categoria_id" class="form-control">
                                    @foreach ($categorias as $row)
                                        <option value="{{$row->id}}">{{$row->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Generar ticket
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection