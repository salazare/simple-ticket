@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$title}}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    {{--@include('common.errors')--}}

                    <form action="{{$url}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombre" class="form-control" value="{{ $form->nombre }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Actualizar categoría
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection