<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index(){
	if(Auth::check()){
		return view('logged');}
	return view('login');
	}

    public function login(Request $request){
	$request->validate(['email'=>'required', 'password'=>'required',]);

	$credentials= $request->only('email','password');

	if(Auth::attempt($credentials)){
		return redirect()->intended('logged')->withSuccess('Sesión iniciada correctamente');
	}

	return redirect("/")->withSuccess('Los datos no son correctos');
	}

    public function logged(){
	if(Auth::check()){
		return view('logged');
	}

		return redirect()->intended('logged')
			->withSuccess('Logeado de manera correcta');

	return redirect("/")->withSuccess('No tienes acceso, inicia sesión');
	}
}
