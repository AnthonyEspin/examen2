<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CircuitoController extends Controller
{
    /**
     * Mostrar lista de circuitos.
     */
    public function index()
    {
        return view('circuitos.index');  // vista lista
    }

    /**
     * Mostrar formulario para crear un circuito.
     */
    public function create()
    {
        return view('circuitos.nuevo');  // vista nuevo
    }

    /**
     * Guardar un nuevo circuito.
     */
    public function store(Request $request)
    {
        // Validar datos básicos (ejemplo)
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Aquí pondrías la lógica para guardar el circuito (por ejemplo, en la BD)

        // Por ahora solo retornamos mensaje de éxito:
        return redirect()->route('circuitos.index')->with('success', 'Circuito creado correctamente');
    }

    /**
     * Mostrar un circuito específico.
     */
    public function show($id)
    {
        // Aquí puedes obtener el circuito por $id y pasarlo a la vista
        return "Mostrar circuito con ID: " . $id;
    }

    /**
     * Mostrar formulario para editar un circuito.
     */
    public function edit($id)
    {
        // Aquí obtienes el circuito para editar
        return "Formulario para editar circuito con ID: " . $id;
    }

    /**
     * Actualizar un circuito.
     */
    public function update(Request $request, $id)
    {
        // Validar y actualizar datos
        return "Actualizar circuito con ID: " . $id;
    }

    /**
     * Eliminar un circuito.
     */
    public function destroy($id)
    {
        // Lógica para eliminar circuito
        return "Eliminar circuito con ID: " . $id;
    }
}
