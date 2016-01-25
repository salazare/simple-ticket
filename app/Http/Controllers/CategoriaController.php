<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenericForm;

class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        return view('generic.index', ['rows' => $categorias, 'title_add' => 'Nueva Categoría',
            'title_list' => 'Listado de categorías', 'url' => 'categorias',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericForm $request)
    {
        if ($request->user()->type === 'admin') {
            Categoria::create(['nombre' => $request->nombre]);
        }
        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('generic.edit', ['form' => $categoria, 'title' => 'Editar Categoría',
            'url' => '/categorias/'.$id ,]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenericForm $request, $id)
    {
        if ($request->user()->type === 'admin') {
            $categoria = Categoria::find($id);
            $categoria->nombre = $request->nombre;
            $categoria->save();
        }
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if ($request->user()->type === 'admin') {
            $categoria->delete();
        }
        return redirect('/categorias');
    }
}
