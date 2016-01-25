@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <a href="{{ url('/tickets/create') }}" class="btn btn-primary">Generar nuevo ticket</a>
            <br><br>

            @if (count($rows) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$title}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td class="table-text">{{$row->id}}</td>
                                    <td class="table-text">{{$row->titulo}}</td>
                                    <td class="table-text">{{$row->categoria->nombre}}</td>
                                    <td class="table-text">{{$row->estado->nombre}}</td>
                                    <td class="table-text">{{$row->created_at}}</td>
                                    <td class="table-text"><a href="/tickets/{{$row->id}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-info-circle"></i> Información
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$title}}
                    </div>

                    <div class="panel-body">
                        <h3>Usted no posee tickets en esta sección</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection