<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use DB;

class CatalogController extends Controller
{

    function getIndex() 
    {
        $movies = DB::table('movies')->get();
    	return view('catalog.index', ['arrayPeliculas'=>$movies]);
    }

    function getShow($id) 
    {   
        $movies = DB::table('movies')->find($id);
    	return view('catalog.show', array('id'=>$movies));
    }

    function getCreate() 
    {
    	return view('catalog.create');
    }

    function getEdit($id)
    {
        $movies = DB::table('movies')->find($id);
    	return view('catalog.edit', array('id'=>$movies));
    }

    function postCreate(Request $request){   
        $validatedData = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);
        $id = Movie::create($validatedData);   
        return redirect('catalog');
    }

    function putEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'year' => 'required',
            'title' => 'required',
            'director' => 'required',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);
        Movie::whereId($id)->update($validatedData);
        return redirect('catalog/show/'.$id);
    }
}
