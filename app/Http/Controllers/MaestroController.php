<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maestros = Maestro::all();
        return view('maestros.index',compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('maestros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $maestros = new Maestro();

        $request -> validate([
            'codigo' => ['required', 'unique:maestros,codigo', 'numeric', 'digits:10'],
            'nombre' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'apellidoPaterno' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'apellidoMaterno' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'nss' => ['required', 'unique:maestros,nss', 'numeric', 'digits:12'],
            'correo' => ['required', 'unique:maestros,correo', 'email:rfc, dns']
        ]);

        $maestros->codigo = $request->get('codigo');
        $maestros->nombre = $request->get('nombre');
        $maestros->apellidoPaterno = $request->get('apellidoPaterno');
        $maestros->apellidoMaterno = $request->get('apellidoMaterno');
        $maestros->nss = $request->get('nss');
        $maestros->correo = $request->get('correo');

        $maestros->save();

        return redirect('/maestros');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestro $maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $maestro = Maestro::find($id);
        return view ('maestros.edit', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $maestro = Maestro::find($id);

        $request->validate([
            'codigo' => ['required', 'unique:maestros,codigo', Rule::unique('maestros', 'codigo')->ignore($id), 'numeric','min:10', 'max:10'],
            'nombre' => ['required'],
            'apellido_paterno' => ['required'],
            'apellido_matero' => ['required'],
            'nss' => ['required', 'unique:maestros,nss', Rule::unique('maestros', 'nss')->ignore($id), 'numeric', 'min:12', 'max:12'],
            'correo' => ['required', 'unique:maestros,correo', Rule::unique('maestros', 'correo')->ignore($id), 'email:rfc, dns']
        ]);

        $maestro->codigo = $request->get('codigo');
        $maestro->nombre = $request->get('nombre');
        $maestro->apellidoPaterno = $request->get('apellidoPaterno');
        $maestro->apellidoMaterno = $request->get('apellidoMaterno');
        $maestro->nss = $request->get('nss');
        $maestro->Correo = $request->get('correo');

        $maestro->save();

        return redirect('/maestros');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $maestro = Maestro::find($id);
        $maestro->delete();

        return redirect('/maestros');
    }
}
