<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Compte;
class UserController extends Controller
{
    function index(Request $request)
    {
        // print_r($request);
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => 'err'
                ], 201);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'message' => 'succ',
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }


    public function register(Request $request)
    {

      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'offre' => $request->offre,
         'phone' => $request->phone,
         'adress' => $request->adress,
         'role' => $request->role,
         'c_id' => $request->c_id,
       ]);

       $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function listutilisateur(){
        return response()->json([
            'success' => true,
            'user' => User::all(), 
        ]);
    }
    public function listeCompte(Request $request)
    {
        $comptes = Compte::all();
        return response()->json([
            'success' => true,
            'comptes' => $comptes, 
        ]);
    }
    public function getUserById(Request $request)
    {
        $user = User::find($request->id);
        return response()->json([
            'success' => true,
            'user' => $user, 
        ]);
    }
    public function listeUser(Request $request)
    {
        $users = User::where('role',2)->get();
        return response()->json([
            'success' => true,
            'users' => $users, 
        ]);
    }
    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->adress = $request->adress;
        $user->save(); 
 
        return response()->json([
            'success' => true,
            'user' => $user, 
            'message' => 'User updated',
        ]);
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'User deleted',
        ]);
    }
}
