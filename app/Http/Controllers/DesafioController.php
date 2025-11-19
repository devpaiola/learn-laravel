<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class DesafioController extends Controller
{
    public function index()
    {
        $name = 'Fabricio';
        $topicos = Topic::where('completed', false)->get();   
        return view('welcome', [
            'topicos' => $topicos,
            'nome' => $name
        ]);
    }
}
