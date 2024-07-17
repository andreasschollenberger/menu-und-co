<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\RecipesGroups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecipesGroupsController extends Controller
{
    public function index()
    {
        return RecipesGroups::all();
    }
    
    public function show(RecipesGroups $recipesGroups)
    {
        return $recipesGroups;
    }

    public function store(Request $request)
    {
        dd($request->user());
        if ($request->user()->can('is-admin')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = request()->validate([
            'name' => 'required|string'
        ]);

        return RecipesGroups::create($data);
    }

    public function update(RecipesGroups $recipesGroups)
    {
        $data = request()->validate([
            'name' => 'required|string'
        ]);

        $recipesGroups->update($data);

        return $recipesGroups;
    }

    public function destroy(RecipesGroups $recipesGroups)
    {
        $recipesGroups->delete();

        return response()->json(null, 204);
    }

}
