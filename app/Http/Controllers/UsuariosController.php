<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    
    function exibeLogin(){
    	return view('login');
    }

    function tentaLogin(Request $req){
       	// verificar usuario e senha
    	$email = $req->input('email');
    	$senha = $req->input('senha');
    	
    	$u = Usuario::where('email', '=', $email)->first();
    	$us = Usuario::all();
    	
    	if ($u && $u->senha == $senha){
			session(['login' =>$email]);
    		return redirect()->route('usuario_lista');
    	} else {
       		return view('retornologin', [
    			'resposta' => "Acesso negado",
    			'tipo_resposta' => 'danger',
    			'usuarios' => $us
    		]);
    	}
    }

	function novo(){
		return view('usuario_novo');
	}
	
	function inserir(Request $req){
		$nome = $req->input('nome');
		$email = $req->input('email');
		$senha = $req->input('senha');

		$u = new Usuario();
		$u->nome = $nome;
		$u->email = $email;
		$u->senha = $senha;
		
		$u->save();	

		session()->flash('mensagemNovoUsuario', "O usuario {$u->nome} foi salvo 
		com sucesso");
		return redirect()->route('usuario_lista');	

	}

	function tela_principal(){
		if(session()->has('login')){
		$us = Usuario::all();
		return view('retornologin', [
			'resposta' => "Acesso concedido",
			'tipo_resposta' => 'success',
			'usuarios' => $us
		]);
		}else{
			return redirect()->route('login');
		}
	}

	function editar($id){
		$u = Usuario::find($id);
		return view('usuario_editar', [
			'u' =>$u
		]);
	}

	function  alterar(Request $req, $id) {
		$u = Usuario::find($id);
		$u->nome = $req->input('nome');
		$u->email = $req->input('email');
		$u->senha = $req->input('senha');
		$u->save();

		session()->flash('mensagemAlteradoUsuario', "O usuario {$u->nome} foi alterado 
		com sucesso");
		return redirect()->route('usuario_lista');

	}

	function excluir($id){
		$u  = Usuario::findOrFail($id);
		$u->delete();

		return redirect()->route('usuario_lista');
	}

	function logout(){
		session()->forget('login');

		return redirect()->route('login');
	}
}
