<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;

class OffreController extends Controller
{
    public function index(Request $request)
    {
        $offre = Offre::all();
        return response()->json([
            'success' => true,
            'offre' => $offre,
        ]);
    }
    public function create(Request $request)
    {
        $offre = Offre::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
          ]);
   
           return response()->json([
               'success' => true,
               'offre' => $offre,
               'message' => 'Offre created',
           ]);
    }
    public function update(Request $request)
    {
            $offre = Offre::find($request->id);
            $offre->name = $request->name;
            $offre->user_id = $request->user_id;
            $offre->save();
            return response()->json([
                'success' => true,
                'offre' => $offre,
                'message' => 'offre updated',
            ]);
    }
    public function delete(Request $request)
    {
        $offre = Offre::find($request->id);
        $offre->delete();
        return response()->json([
            'success' => true,
            'message' => 'offre deleted',
        ]);
    }
    public function getById(Request $request)
    {
        $offre = Offre::find($request->id);
        return response()->json([
            'success' => true,
            'Offre' => $offre,
        ]);
    }
}
