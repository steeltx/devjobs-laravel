<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Experiencia;
use App\Salario;
use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{

    public function __construct()
    {
        // revisar que el usuario este logueado y correo verificado
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("vacantes.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // consultas de catalogos
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create')
            ->with('categorias',$categorias)
            ->with('experiencias',$experiencias)
            ->with('ubicaciones',$ubicaciones)
            ->with('salarios',$salarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validaciones
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50'
        ]);
        return "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    //
    public function imagen(Request $request){

        $imagen = $request->file('file');
        $nombreImagen = time().'.'.$imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);

        return response()->json(['correcto' => $nombreImagen]);
    }

    // borrar imagen
    public function borrarimagen(Request $request){
        if($request->ajax()){
            $imagen = $request->get('imagen');

            if(File::exists('storage/vacantes/'.$imagen)){
                File::delete('storage/vacantes/'.$imagen);
            }

            return response('Imagen Eliminada',200);
        }
    }
}
