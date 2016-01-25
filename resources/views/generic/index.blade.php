@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$title_add}}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    {{--@include('common.errors')--}}

                    <form action="/{{$url}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-6">
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($rows) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$title_list}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $row->nombre }}</div>
                                    </td>

                                    <td>
                                        <form action="/{{$url}}/{{ $row->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="/{{$url}}/{{ $row->id }}/edit" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>Editar</a>

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection