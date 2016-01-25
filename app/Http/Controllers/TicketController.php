<?php

namespace App\Http\Controllers;

use App\User;
use App\Categoria;
use App\Comentario;
use App\Estado;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketForm;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::where('user_id', $request->user()->id)
            ->whereNull('cierre_at')->orderBy('id', 'desc')->get();
        return view('generic.tickets', ['rows' => $tickets, 'title' => 'Mis tickets abiertos',]);
    }

    public function cerrados(Request $request)
    {
        $tickets = Ticket::where('user_id', $request->user()->id)
            ->whereNotNull('cierre_at')->orderBy('id', 'desc')->get();
        return view('generic.tickets', ['rows' => $tickets, 'title' => 'Mis tickets cerrados',]);

    }

    public function completados(Request $request)
    {
        $tickets = Ticket::where('operador_id', $request->user()->id)
            ->whereNotNull('cierre_at')->orderBy('id', 'desc')->get();
        return view('generic.tickets', ['rows' => $tickets, 'title' => 'Mis tickets completados',]);

    }

    public function pendientes(Request $request)
    {
        $tickets = Ticket::whereNull('cierre_at')->orderBy('id', 'desc')->get();
        return view('generic.tickets_admin', ['rows' => $tickets, 'title' => 'Tickets pendientes por asignar',]);
    }

    public function asignados(Request $request)
    {
        $tickets = Ticket::where('operador_id', $request->user()->id)
            ->where('estado_id', 2)->orderBy('id', 'desc')->get();
        return view('generic.tickets_admin', ['rows' => $tickets, 'title' => 'Mis tickets asignados',]);
    }

    public function todos_asignados(Request $request)
    {
        $tickets = Ticket::whereNotNull('operador_id')
            ->where('estado_id', 2)->orderBy('id', 'desc')->get();
        return view('generic.tickets_admin', ['rows' => $tickets, 'title' => 'Tickets asignados por operador',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('generic.ticket_form', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketForm $request)
    {
        Ticket::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'estado_id' => 1,
            'user_id' => $request->user()->id,
        ]);
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $comentarios = Comentario::where('ticket_id', $id)->orderBy('id')->get();
        $operadores = User::where('type', 'operador')->orderBy('name')->get();
        return view('generic.info_ticket', ['ticket' => $ticket, 'comentarios' => $comentarios, 'operadores' => $operadores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }

    public function tomar(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->operador_id = $request->user()->id;
        $ticket->operador_at = date(DATE_ATOM);
        $ticket->estado_id = 2;
        $ticket->save();
        return redirect('/tickets/' . $id);
    }

    public function asignar(Request $request, $id)
    {
        $this->validate($request, [
            'ticket_id' => 'required',
            'operador_id' => 'required',
        ]);

        $ticket = Ticket::find($id);
        if($ticket->estado_id === 1 and $request->user()->type==='admin'){
            $ticket->operador_id = $request->operador_id;
            $ticket->operador_at = date(DATE_ATOM);
            $ticket->estado_id = 2;
            $ticket->save();
        }
        return redirect('/tickets/' . $id);
    }

    public function cerrar(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($request->user()->id == $ticket->user_id and $ticket->estado_id == 2) {
            $ticket->cierre_at = date(DATE_ATOM);
            $ticket->estado_id = 3;
            $ticket->save();
        }
        return redirect('/tickets/' . $id);
    }

}
