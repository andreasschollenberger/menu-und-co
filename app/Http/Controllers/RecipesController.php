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


        // $recipes_groups = RecipesGroups::find($request->recipes_group_id);
        // $country = Countries::find($request->country_id);




        $recipes = Recipes::create([
            'user_id'=> $request->user()->id,
            'title' => $request->title,
            'image' => $request->file('image')? Storage::disk('public')->put('recipes', $request->file('image')): null,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'dish_id' => $request->dish_id,
            'recipes_group_id' => $request->recipes_group_id,
            'country_id' => $request->country_id

        ]);

        $recipes->allergies()->attach(json_decode($request->allergies, true));
        $recipes->vitamins()->attach(json_decode($request->vitamins, true));
        $recipes->save();
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
