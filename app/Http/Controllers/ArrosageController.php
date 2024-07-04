<?php
namespace App\Http\Controllers;

use App\Models\Arrosage;
use Illuminate\Http\Request;

class ArrosageController extends Controller
{
    public function store(Request $request, $plantId)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'frequency' => 'required|integer',
        ]);

        $arrosage = new Arrosage([
            'quantity' => $request->quantity,
            'frequency' => $request->frequency,
        ]);

        $arrosage->plant_id = $plantId;
        $arrosage->save();

        return response()->json($arrosage, 201);
    }

    public function update(Request $request, $plantId, $arrosageId)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'frequency' => 'required|integer',
        ]);

        $arrosage = Arrosage::findOrFail($arrosageId);
        $arrosage->update([
            'quantity' => $request->quantity,
            'frequency' => $request->frequency,
        ]);

        return response()->json($arrosage, 200);
    }
}

