<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Zeigt eine Auflistung der Ressource an.
     */
    public function index()
    {
        return Recipes::all();
    }

    /**
     * Zeigen Sie das Formular zum Erstellen einer neuen Ressource an.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Speichern Sie eine neu erstellte Ressource im Speicher.
     */
    public function store(Request $request)
    {
        $recipe = new Recipes;
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    /**
     * Zeigt die angegebene Ressource an.
     */
    public function show(Recipes $recipes)
    {
        return $recipes;
    }

    /**
     * Zeigt das Formular zum Bearbeiten der angegebenen Ressource an.
     */
    public function edit(Recipes $recipes)
    {
        return view('recipes.edit', compact('recipes'));
    }

    /**
     * Aktualisieren Sie die angegebene Ressource im Speicher.
     */
    public function update(Request $request, Recipes $recipes)
    {
        $recipes->title = $request->input('title');
        $recipes->description = $request->input('description');
        $recipes->save();

        return redirect()->route('recipes.index');
    }

    /**
     * Entfernen Sie die angegebene Ressource aus dem Speicher.
     */
    public function destroy(Recipes $recipes)
    {
        $recipes->delete();

        return redirect()->route('recipes.index');
    }
}
