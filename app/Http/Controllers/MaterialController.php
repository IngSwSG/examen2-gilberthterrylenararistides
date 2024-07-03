<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }
}
