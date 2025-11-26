<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ResourceBundle;

class DesafioController extends Controller
{
    public function index()
    {
        $topics = Auth::check() ? Auth::user()->topics()->latest()->paginate(5)
         : [];

        return view('welcome', [
            'topics' => $topics
        ]);
    }

    public function store (Request $request)
    {
        $request->validate(['name' => 'required']);

        // Mágica do Relacionamento:
        // Pega o usuário logado -> acessa a relação topics() -> cria novo
        $request->user()->topics()->create([
            'name' => $request->input('name')
        ]);

        return redirect('/');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return back();
    }

    public function edit(Topic $topic)
    {
        return view('edit', ['topic' => $topic]);
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate(['name' => 'required']);
    
        $topic->update([
            'name' => $request->input('name')
        ]);

        return redirect('/');
    }
}   
