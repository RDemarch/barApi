<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

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
      // create a post
      return Utilisateur::create($request->all());
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
      if ($data && Hash::check($password, $data->password)) return response()->json(['status' => 200, 'token' => $data->token, 'login' => $data->login]);
      return response()->json(['status' => 401]);
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
