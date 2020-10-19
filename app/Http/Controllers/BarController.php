<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bar;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bar::all();
        return $data;
    }

    // public function getfix()
    // {
    //   $datas = Bar::all();
    //   foreach($datas as $d){
    //     $d->horaire_jour = str_replace('\\', '/', $d->horaire_jour);
    //     $d->save();
    //   }
    //   return "test";
    //  }
     // fonction pour retirer des éléments de horaire_jour

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'nom' => 'required'
        ]);
        // create a post
        return Bar::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a single post
        $data = Bar::find($id);
        return $data;
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
        // update a post
        $bar = Bar::find($id);
        $bar->update($request->all());
        return $bar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a post
        return Bar::destroy($id);
    }
}
