<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        // $validatedData = $request->validate([
        // 'name' => 'required|string|max:255',
        // 'email' => 'required|string|email|max:255|unique:users',
        // 'password' => 'required|string|min:8',
        // 'offre' => 'required|string|min:8',
        // 'adress' => 'required|string',
        // 'phone' => 'required|string',
        // 'role' => 'required|string',
        // 'c_id' => 'required|string',
        // ]);

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

    public function parametreCompte(Request $request)
    { 
        $user = User::find($request->id); 
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tel = $request->tel;
        $user->adresse = $request->adresse;
        $user->save(); 
 
        return response()->json([
            'success' => true,
            'user' => $user, 
        ]);
    }

    public function userById(Request $request)
    { 
        
       $user = User::find($request->id);  
        return response()->json([
            'success' => true,
            'user' => $user, 
        ]);
    }

    public function changeEtat(Request $request)
    {
        $validatedData = $request->validate([
        'id' => 'required',
        'etat' => 'required|string', 
        ]);
        $user = User::find($validatedData['id']);
        $user->etat = $validatedData['etat'];
        $user->save(); 
 
        return response()->json([
            'success' => true,
            'user' => $user, 
        ]);
    }

    
    public function checkIfUserConducteur(Request $request)
    {
        $validatedData = $request->validate([
        'id' => 'required',  
        ]);
        $id=$validatedData['id']; 

        $users = DB::table('users')
            ->join('conducteurs', 'users.conducteur_id', '=', 'conducteurs.id') 
            ->select('users.*', 'conducteurs.*')
            ->where("users.id",$id)
            ->where("users.role","3")
            ->get()->count();

 
        return response()->json([
            'success' => true,
            'user' => $users, 
        ]);
    }

    public function addInfoUserConducteur(Request $request){
    
        $validatedData = $request->validate([
            'id' => 'required',
            'numPermis' => 'required|string|max:255|unique:conducteurs',
            'dateLivraison' => 'required|string|min:8',
            'dateFinValidite' => 'required|string|min:8'
            ]);

        $conducteurs = Conducteurs::create([
            'numPermis' =>  $validatedData['numPermis'],
            'dateLivraison' => $validatedData['dateLivraison'], 
            'dateFinValidite' => $validatedData['dateFinValidite'] 
        ]);
         
        $user = User::find($validatedData['id']);
        $user->conducteur_id = $conducteurs->id;
        $user->save();
        return response()->json([
            'success' => true,
            'user' => $conducteurs, 
        ]);
    }
}
