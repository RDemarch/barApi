<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use App\Models\Proprietaire;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Utilisateur::all();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'login' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'password' => 'required'
      ]);
      $data = $request->all();
      $data['password'] = Hash::make($request->input('password'));
      $data['token'] = bin2hex(random_bytes(32));
      // create a post
      Utilisateur::create($data);
      return response()->json(['status' => 200, 'token' => $data['token']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = Utilisateur::find($id);
      return $user;
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
      $login = $request->input('login');
      $password = $request->input('password');
      $data = Utilisateur::where('login', '=', $login)->first();
      if ($data != NULL) {
        if ($data && Hash::check($password, $data->password)){
          $response = ['status' => 200, 'token' => $data->token, 'login' => $data->login];
          if ($data->isOwner) {
            $bar = Proprietaire::where('id_user', '=', $data->id)->first();
            $response['id_bar'] = $bar->id_bar;
          }
          return response()->json($response);
       }
      }
      return response()->json(['status' => 401]);
    }

    public function newPassword(Request $request) {
      $password = $request->input('password') ?? 12345678;
      var_dump($password);
      return Hash::make($password);
    }

    public function getfix()
    {
      return "Cette page ne sert à rien... Pour l'instant...";
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
