<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Folder_comptable;

class FolderComptableController extends Controller
{
    public function index(Request $request)
    {
        $f_comptable = Folder_comptable::all();
        return response()->json([
            'success' => true,
            'Folder Comptable' => $f_comptable,
        ]);
    }
    public function create(Request $request)
    {
        $f_comptable = Folder_comptable::create([
            'num_f' => $request->num_f,
            'name' => $request->name,
            'user_id' => $request->user_id,
          ]);
   
           return response()->json([
               'success' => true,
               'Folder Comptable' => $f_comptable,
               'message' => 'Folder Comptable created',
           ]);
    }
    public function update(Request $request)
    {
            $f_comptable = Folder_comptable::find($request->id);
            $f_comptable->num_f = $request->num_f;
            $f_comptable->name = $request->name;
            $f_comptable->user_id = $request->user_id;
            return response()->json([
                'success' => true,
                'Movement Comptable' => $f_comptable,
                'message' => 'Folder Comptable updated',
            ]);
    }
    public function delete(Request $request)
    {
        $f_comptable = Folder_comptable::find($request->id);
        $f_comptable->delete();
        return response()->json([
            'success' => true,
            'message' => 'Folder Comptable deleted',
        ]);
    }
}
