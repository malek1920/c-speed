<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mv_comptable;

class MvComptableController extends Controller
{
    public function index(Request $request)
    {
        $mv_comptable = Mv_comptable::all();
        return response()->json([
            'success' => true,
            'Movement Comptable' => $mv_comptable,
        ]);
    }
    public function create(Request $request)
    {
        $mv_comptable = Mv_comptable::create([
            'user_id' => $request->user_id,
            'f_id' => $request->f_id,
            'mv_comp_global' => $request->mv_comp_global,
            'code' => $request->code,
            'libelle_debit' => $request->libelle_debit,
            'libelle_credit' => $request->libelle_credit,
            'm_debit' => $request->	m_debit,
            'm_credit' => $request->m_credit,
          ]);
   
           return response()->json([
               'success' => true,
               'Movement Comptable' => $mv_comptable,
               'message' => 'Mv Comptable created',
           ]);
    }
    public function update(Request $request)
    {
            $mv_comptable = Mv_comptable::find($request->id);
            $mv_comptable->user_id = $request->user_id;
            $mv_comptable->f_id = $request->f_id;
            $mv_comptable->mv_comp_global = $request->mv_comp_global;
            $mv_comptable->code = $request->code;
            $mv_comptable->libelle_debit = $request->libelle_debit;
            $mv_comptable->libelle_credit = $request->libelle_credit;
            $mv_comptable->m_debit = $request->m_debit;
            $mv_comptable->m_credit = $request->m_credit;
            $mv_comptable->save();
            return response()->json([
                'success' => true,
                'Movement Comptable' => $mv_comptable,
                'message' => 'Mv Comptable updated',
            ]);
    }
    public function delete(Request $request)
    {
        $mv_comptable = Mv_comptable::find($request->id);
        $mv_comptable->delete();
        return response()->json([
            'success' => true,
            'message' => 'Mv Comptable deleted',
        ]);
    }
    public function getById(Request $request)
    {
        $mv_comptable = Mv_comptable::find($request->id);
        return response()->json([
            'success' => true,
            'mv_comptable' => $mv_comptable,
        ]);
    }
    public function getMvComptable(Request $request)
    {
        $mv_global = Mv_comptable::where('mv_comp_global',$request->id)->get();
        return response()->json([
            'success' => true,
            'mv_global' => $mv_global,
        ]);
    }
}
