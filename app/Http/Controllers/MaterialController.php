<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = Material::create($request->validated());

        return response()->json([
            'message' => 'Material creado exitosamente',
            'material' => $material
        ], 201);
    }

}
