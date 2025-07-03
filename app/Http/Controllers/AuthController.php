<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{



    public function index(Request $request){

      if (Auth::check()) {
        return redirect(route('home'));
      }

    return view('login');

    }


    public function register(Request $request){

        if (Auth::check()) {
            return redirect(route('home'));
          }

        return view('register');

        }

        public function registerAction(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);



          $data = $request->only('name','email','password');
          $data['password'] = Hash::make($data['password']);
          $userCreate =  User::create($data);
          if (!$userCreate) {
            return 'Erro ao atualizar!';
        }

          return redirect(route('home'));

            }



            public function login_action(Request $request){

             $validador =   $request->validate([
                    'email'=>'required|email',
                    'password'=>'required|min:6',
                ]);

                 $user = User::where('email', $validador['email'])->first();

                 if (!$user) {
                    return redirect()->back()->withErrors(['email' => 'Usuário não cadastrado.'])->withInput();
    }

              if(Auth::attempt($validador)){

                return redirect(route('home'));
              }

                 return redirect()->back()->withErrors(['password' => 'Senha inválida.'])->withInput();
               //   return redirect(route('home'));

                    }


        public function logout(){

            Auth::logout();

            return redirect(route('login'));
        }

}
