<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bilan;

class BilanController extends Controller
{
    public function index(Request $request)
    {
        $bilans = Bilan::all();
        return response()->json([
            'success' => true,
            'bilan' => $bilans,
        ]);
    }
    public function create(Request $request)
    {
        $bilan = Bilan::create([
            'code' => $request->code,
            'mv_comptable_id' => $request->mv_comptable_id,
            'nom' => $request->nom,
            'etat' => $request->etat, 
          ]);
   
           return response()->json([
               'success' => true,
               'bilan' => $bilan,
               'message' => 'Bilan Created',
           ]);
    }
    public function update (Request $request)
    {
        $bilan = Bilan::find($request->id);
        $bilan->code = $request->code;
        $bilan->mv_comptable_id = $request->mv_comptable_id;
        $bilan->nom = $request->nom;
        $bilan->etat = $request->etat; 
        $bilan->save();
        return response()->json([
            'success' => true,
            'bilan' => $bilan,
            'message' => 'Bilan updated',
        ]);
    }
    public function delete(Request $request)
    {
        $bilan = Bilan::find($request->id);
        $bilan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Bilan deleted',
        ]);
    }
    public function getById(Request $request)
    {
        $bilan = Bilan::find($request->id);
        return response()->json([
            'success' => true,
            'bilan' => $bilan,
        ]);
    }
}
