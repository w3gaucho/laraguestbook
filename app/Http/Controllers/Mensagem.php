<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mensagem;

class Mensagem extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::all();
        return view('index', compact('mensagens'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $mensagens = [
            'mensagem.required' => 'Digite uma mensagem.',
        ];

        $this->validate($request,[
            'mensagem' => 'required|max:280'
        ], $messages);

        Mensagem::create($input)->id;

        $request->session()->flash('alert-success', 'Mensagem enviada com sucesso!');

        return redirect('/');
    }

    public function show($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('show', compact('mensagem'));
    }

    public function destroy($id, Request $request)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();
        $request->session()->flash('alert-success', 'Mensagem apagada com sucesso!');
        return redirect('/');
    }
}
