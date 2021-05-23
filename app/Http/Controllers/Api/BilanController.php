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
            'actif' => $request->actif,
            'passif' => $request->passif,
            'm_actif' => $request->m_actif,
            'm_passif' => $request->m_passif,
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
        $bilan->actif = $request->actif;
        $bilan->passif = $request->passif;
        $bilan->m_actif = $request->m_actif;
        $bilan->m_passif = $request->m_passif;
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
}
