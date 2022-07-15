<?php

namespace App\Http\Controllers;
use App\Models\Postulant;
use Illuminate\Http\Request;
use App\Models\Grupof;

class IngresogfController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function store(Request $request ,$id)
    {       
        
        return  view('grupof.create')->with('id',$id);
            
    }

    


}