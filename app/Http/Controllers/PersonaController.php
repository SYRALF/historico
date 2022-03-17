<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['personas']=Persona::paginate(8);
        return view('persona.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Cedula'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El campo :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPersona = request()->except('_token');
        Persona::insert($datosPersona);
        //return response()->json($datosPersona);
        return redirect('persona')->with('mensaje','Persona registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona=Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Cedula'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El campo :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //
        $datosPersona = request()->except(['_token','_method']);

        Persona::where('id','=',$id)->update($datosPersona);

        $persona=Persona::findOrFail($id);


        //return view('persona.edit', compact('persona')); --para dejar en el mismo formulario una vez editado
        return redirect('persona')->with('mensaje','Persona modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Persona::destroy($id);
        return redirect('persona')->with('mensaje','Persona Eliminada con éxito');
    }
}
