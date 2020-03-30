<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mensagem;

class MensagemController extends Controller
{
    public function destroy($id, Request $request)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();
        $request->session()->flash('success', 'Mensagem apagada com sucesso!');
        return redirect('/');
    }

    public function index()
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->get();
        $cookieDeleteValue=$this->random();
        if(isset($_COOKIE['cookieDelete'])){
            putenv('cookieDelete='.$cookieDeleteValue);
        }else{
            setcookie('cookieDelete',$cookieDeleteValue);
            putenv($cookieDeleteValue);
        }
        return view('index', compact('mensagens'));
    }

    function random($limit=10){
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        $randomStr = '';
        for ($i = 0; $i < $limit; $i++) {
            $randomStr .= $str[rand(0, mb_strlen($str)-1)];
        }
        return $randomStr;
    }

    public function show($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('show', compact('mensagem'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $mensagens = [
            'cookieDelete'=>'Cookie inválido',
            'mensagem.required' => 'Digite uma mensagem',
        ];

        $this->validate($request,[
            'cookieDelete'=>'required|min:10|max:10',
            'mensagem' => 'required|min:1|max:280'
        ], $mensagens);

        Mensagem::create($input)->id;

        $request->session()->flash('success', 'Mensagem enviada com sucesso!');

        return redirect('/');
    }

}
