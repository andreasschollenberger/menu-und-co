<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\Dishes; // Add this line
use App\Models\RecipesGroups; // Add this line
use App\Models\Countries; // Add this line

use App\Http\Resources\RecipesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    /**
     * Zeigt eine Auflistung der Ressource an.
     */
    public function index()
    {
        return RecipesResource::collection(Recipes::all());
    }

    /**
     * Zeigen Sie das Formular zum Erstellen einer neuen Ressource an.
     */
    // public function create()
    // {
    //     return view('recipes.create');
    // }

    /**
     * Speichern Sie eine neu erstellte Ressource im Speicher.
     */
    public function store(Request $request)
    {
        // $recipe = new Recipes; /*für blade Template */
        // $recipe->title = $request->input('title');
        // $recipe->description = $request->input('description');
        // $recipe->save();

        // return redirect()->route('recipes.index');

        $dish = Dishes::find($request->dish_id);
        $recipe = $dish->recipes;
        $recipe = Recipes::find(1);
        $dish = $recipe->dish;
        $recipes_groups = RecipesGroups::find($request->recipes_group_id);
        $country = Countries::find($request->country_id);

        $recipe = Recipes::create([
            'user_id'=> $request->user()->id,
            'titel' => $request->title,
            'description' => $request->description,
            'image' => Storage::disk('public')->put('recipes', $request->file('image')),
            'nutrition' => $request->nutrition,
            'vitamins' => $request->vitamins,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'dish_id' => $dish,
            'resipes_group_id' => $recipes_groups,
            'country_id' => $country

        ]);
    }

    /**
     * Zeigt die angegebene Ressource an.
     */
    public function show($id)
    {
        return new RecipesResource(Recipes::findOrFail($id));
    }

    /**
     * Zeigt das Formular zum Bearbeiten der angegebenen Ressource an.
     */
    // public function edit(Recipes $recipes)
    // {
    //     return view('recipes.edit', compact('recipes'));
    // }

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
