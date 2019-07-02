<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function register(Request $request){
      $user= new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      return redirect('/')->with('success','compte créer');

    }
    public function create(){
        return view('users.add');

    }

    public function login(){
        return view('users.login');

    }
    public function auth(Request $request){
      
        if(auth::attempt(['email'=>$request->email,'password'=>$request->password])){
          return redirect('/');


        }else{

            return redirect()->route('user.login')->with('fail','Email ou maot de passe est incorrect');
        }

    }
     public function logout(){
        
        Auth::logout();
        return redirect('/');

     }


}
