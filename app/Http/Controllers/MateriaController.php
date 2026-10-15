<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('materia.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|unique:materias',
            'creditos' => 'required|integer',
            'profesor' => ['nullable', 'string', 'max:255'],
        ]);

        Materia::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'creditos' => $request->creditos,
            'profesor' => $request->profesor,
        ]);

        return redirect('/materia')->with('success', 'Materia registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia): View
    {
        return view('materia.show', compact('materia'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia): View
    {
        return view('materia.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'codigo' => ['required', 'string', 'max:255', Rule::unique('materias', 'codigo')->ignore($materia->id)],
            'creditos' => ['required', 'integer'],
            'profesor' => ['nullable', 'string', 'max:255']
        ]);

        $materia->update($validatedData);

        return redirect('/materia')->with('success', 'Materia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia): RedirectResponse
    {
        $materia->delete();

        return redirect('/materia')->with('success', 'Materia eliminada exitosamente.');
    }
}
