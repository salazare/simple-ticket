@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Datos del ticket #{{$ticket->id}}</h3>
                </div>

                <div class="panel-body">
                    <div class="col-sm-4">Ticket: #{{$ticket->id}}</div>
                    <div class="col-sm-4">Estado: {{$ticket->estado->nombre}}</div>
                    <div class="col-sm-4">Categoría: {{$ticket->categoria->nombre}}</div>
                    <div class="col-sm-4">Creado por: {{$ticket->user->name}}</div>
                    <div class="col-sm-8">Creado: {{$ticket->created_at}}</div>

                    @if($ticket->operador_id)
                        <div class="col-sm-4 ">Operador: {{$ticket->operador->name}}</div>
                        <div class="col-sm-4 ">Asignado: {{$ticket->operador_at}}</div>
                        @if($ticket->estado_id == 3)
                            <div class="col-sm-4 ">Cerrado: {{$ticket->cierre_at}}</div>
                        @endif
                    @endif
                    <div class="col-sm-12">Título : {{$ticket->titulo}}</div>
                    <div class="col-sm-12">Descripción : {{$ticket->descripcion}}</div>
                    @if($ticket->estado_id == 1 and Auth::user()->type != 'user')
                        <div class="col-sm-12">
                            <br>
                            <a href="/tickets/tomar/{{$ticket->id}}" class="btn btn-primary">Tomar ticket</a>
                            @if(Auth::user()->type === 'admin')
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal">
                                    Asignar ticket a un operador
                                </button>
                            @endif
                        </div>
                    @endif
                    @if($ticket->estado_id == 2 and Auth::user()->id == $ticket->user_id)
                        <div class="col-sm-12">
                            <br>
                            <a href="/tickets/cerrar/{{$ticket->id}}" class="btn btn-success">Cerrar ticket</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 style="padding: 0px; margin: 0px;">Comentarios</h4>
                </div>

                <div class="panel-body">
                    @if (count($comentarios) > 0)
                        <div class="list-group">
                            @foreach ($comentarios as $row)
                                <a href="#"
                                   class="list-group-item @if($row->user_id == $ticket->operador_id) active @endif">
                                    <h4 class="list-group-item-heading">{{$row->user->name}}
                                        <span><i class="fa fa-clock-o"></i> {{$row->created_at}}</span></h4>
                                    <p class="list-group-item-text">{{$row->descripcion}}</p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <h4>Sin comentarios</h4>
                    @endif

                    <form action="/comentarios" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-sm-12">Deja comentario</label>
                            <div class="col-sm-12">
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                <textarea name="descripcion" class="form-control"
                                          placeholder="Escriba su comentario">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=col-sm-12" align="center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-comment"></i> Comentar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/tickets" class="btn btn-warning">Volver a tickets</a>
            <br><br>
        </div>
    </div>

    @if(Auth::user()->type === 'admin')
            <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form action="/tickets/asignar/{{$ticket->id}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Asignar Ticket a operador</h4>
                    </div>
                    <div class="modal-body" style="margin-bottom: 20px;">
                        <div class="form-group" style="padding: 10px;">
                            <label>Operador</label>
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                            <select name="operador_id" class="form-control" required>
                                <option>Seleccion un operador</option>
                                @foreach($operadores as $op)
                                    <option value="{{$op->id}}">{{$op->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

@endsection