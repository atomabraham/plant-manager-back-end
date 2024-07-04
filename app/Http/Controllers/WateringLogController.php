<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WateringLog;
use App\Models\Plant;

class WateringLogController extends Controller
{
    public function store(Request $request, $plant_id)
    {
        $plant = Plant::find($plant_id);

        if ($plant) {
            $wateringLog = new WateringLog();
            $wateringLog->plant_id = $plant_id;
            $wateringLog->save();

            return response()->json($wateringLog, 201);
        }

        return response()->json(['message' => 'Plant not found'], 404);
    }

    public function index($plant_id)
    {
        $wateringLogs = WateringLog::where('plant_id', $plant_id)->get();

        if ($wateringLogs) {
            return response()->json($wateringLogs);
        }

        return response()->json(['message' => 'No watering logs found'], 404);
    }
}
