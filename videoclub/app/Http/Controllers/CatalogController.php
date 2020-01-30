<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{

    function getIndex() 
    {
        $p = new Movie;        
    	return view('catalog.index'/*, ['arrayPeliculas'=>$this->arrayPeliculas]*/);
    }

    function getShow($id) 
    {
    	return view('catalog.show', array('id'=>$this->arrayPeliculas[$id], 'idpage'=>$id));
    }

    function getCreate() 
    {
    	return view('catalog.create');
    }

    function getEdit($id)
    {
    	return view('catalog.edit', array('id'=>$id));
    }
}
