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
}
