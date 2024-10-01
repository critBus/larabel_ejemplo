<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Persona::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $persona = Persona::create($request->all());
        return response()->json($persona, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return Persona::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $persona = Persona::findOrFail($id);
        $persona->update($request->all());
        return response()->json($persona, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Persona::destroy($id);
        return response()->json(null, 204);
    }
}
