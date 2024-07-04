<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $arrosageController;

    public function __construct(ArrosageController $arrosageController)
    {
        $this->arrosageController = $arrosageController;
    }

    // recuperer toutes les plantes
    public function index()
    {
        return Plant::all();
    }

    // creer une plante
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'espece' => 'nullable|string|max:255',
            'date_achat' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $plant = new Plant();
        $plant->name = $request->name;
        $plant->espece = $request->espece;
        $plant->date_achat = $request->date_achat;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $filename, 'public');
            $plant->image = $path;
        }
    
        $plant->save();
    
        return response()->json($plant);
    }

    // afficher une plante specifique
    public function show($id)
    {
        $plant = Plant::with('arrosages')->find($id);
        if (!$plant) {
            return response()->json(['message' => 'Plant not found'], 404);
        }
    
        return response()->json($plant);
    }

    // mettre a jour une plante
    public function update(Request $request, $id)
    {
        $plant = Plant::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
        ]);

        $plant->update($validatedData);

        return $plant;
    }

    // supprimer une plante
    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return response()->noContent();
    }
}
