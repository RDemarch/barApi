<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        'content' => 'required',
        'id_bar' => 'required',
        'id_user' => 'required'
      ]);
      // create a post
      return Commentaire::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Commentaire::where('id_bar', '=', $id)
                    ->select('commentaires.content', 'utilisateurs.login')
                    ->leftJoin('utilisateurs', 'utilisateurs.id', '=', 'commentaires.id_user')->get();
        return $comments;
    }

    public function showCommentsBar($id)
    {
        $comments = Commentaire::where('id_bar', '=', $id)->get();
        return $comments;
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
        return Commentaire::destroy($id);
    }
}
