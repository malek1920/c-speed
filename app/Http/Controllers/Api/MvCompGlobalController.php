<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movement_comptable_global;

class MvCompGlobalController extends Controller
{
    public function index(Request $request)
    {
        $mv_comptable_global = Movement_comptable_global::all();
        return response()->json([
            'success' => true,
            'Movement_Comptable' => $mv_comptable_global,
        ]);
    }
    public function create(Request $request)
    {
        $mv_comptable_global = Movement_comptable_global::create([
            'user_id' => $request->user_id,
            'f_id' => $request->f_id,
            'code' => $request->code,
            'libelle' => $request->libelle,
            'm_credit_global' => $request->m_credit_global,
          ]);
   
           return response()->json([
               'success' => true,
               'Movement_Comptable' => $mv_comptable_global,
               'message' => 'Mv Comptable created',
           ]);
    }
    public function update(Request $request)
    {
            $mv_comptable_global = Movement_comptable_global::find($request->id);
            $mv_comptable_global->user_id = $request->user_id;
            $mv_comptable_global->f_id = $request->f_id;
            $mv_comptable_global->code = $request->code;
            $mv_comptable_global->libelle = $request->libelle;
            $mv_comptable_global->m_credit_global = $request->m_credit_global;
            $mv_comptable_global->save();
            return response()->json([
                'success' => true,
                'Movement_Comptable' => $mv_comptable_global,
                'message' => 'Mv Comptable updated',
            ]);
    }
    public function delete(Request $request)
    {
        $mv_comptable_global = Movement_comptable_global::find($request->id);
        $mv_comptable_global->delete();
        return response()->json([
            'success' => true,
            'message' => 'Mv Comptable deleted',
        ]);
    }
    public function getById(Request $request)
    {
        $mv_comptable_global = Movement_comptable_global::find($request->id);
        return response()->json([
            'success' => true,
            'mv_comptable' => $mv_comptable_global,
        ]);
    }
}
