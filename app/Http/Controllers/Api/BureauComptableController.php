<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bureau_comptable;

class BureauComptableController extends Controller
{
    public function index(Request $request)
    {
        $bureaux = Bureau_comptable::all();
        return response()->json([
            'success' => true,
            'Bureau comptable' => $bureaux,
        ]);
    }
    public function create(Request $request)
    {
        $bureaux = Bureau_comptable::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'user_id' => $request->user_id,
          ]);
   
           return response()->json([
               'success' => true,
               'Bureau comptable' => $bureaux,
               'message' => 'Bureau comptable Created',
           ]);
    }
    public function update (Request $request)
    {
        $bureaux = Bureau_comptable::find($request->id);
        $bureaux->name = $request->name;
        $bureaux->phone = $request->phone;
        $bureaux->adress = $request->adress;
        $bureaux->user_id = $request->user_id;
        $bureaux->save();
        return response()->json([
            'success' => true,
            'Bureau comptable' => $bureaux,
            'id' => $request->id,
            'message' => 'Bureau comptable updated',
        ]);
    }
    public function delete(Request $request)
    {
        $bureaux = Bureau_comptable::find($request->id);
        $bureaux->delete();
        return response()->json([
            'success' => true,
            'message' => 'Bureau comptable deleted',
        ]);
    }
    public function getById(Request $request)
    {
        $bureau = Bureau_comptable::find($request->id);
        return response()->json([
            'success' => true,
            'Bureau comptable' => $bureau,
        ]);
    }
    public function listeClient(Request $request)
+    {
+        $users = User::where('role',0)->get();
+        return response()->json([
+            'success' => true,
+            'users' => $users, 
+        ]);
+    }
}
