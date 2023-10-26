<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoadStock;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Utils;

class LoadStockController extends Controller
{
    public function index()
    {
        $loadStocks = LoadStock::all();
        return response()->json($loadStocks);
    }

    public function store(Request $request)
    {
        $user = auth('api')->user();
        $data = $request->all();
        $loadStock = LoadStock::create($data);
        return Utils::apiSuccess($loadStock, 'Crop Stock submitted successfully.');
    }

    public function show($id)
    {
        $loadStock = LoadStock::where('user_id', $id)->get();

        return response()->json($loadStock);
    }

    public function update(Request $request, $id)
    {
        $loadStock = LoadStock::findOrFail($id);

        $data = $request->all();
        $loadStock->update($data);
        return Utils::apiSuccess($loadStock, 'Crop Stock edited successfully.');
    }

    public function destroy($id)
    {
        $loadStock = LoadStock::findOrFail($id);
        $loadStock->delete();
        return Utils::apiSuccess($loadStock, 'Crop Stock deleted successfully.');
    }
}
