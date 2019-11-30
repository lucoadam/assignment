<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
class MainController extends Controller {
public function login(Request $request) {

		$rules = array (
				
				'username' => 'required',
				'password' => 'required' 
		);
		$validator = Validator::make ( $request->all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {
		    $user_data = array (

                'name' => $request->get ( 'username' ),
                'password' => $request->get ( 'password' )
            );
			if (auth()->attempt($user_data)) {
                $user = User::where('name',$request->get ( 'username' ))->first();
				session ( [

						'name' => $request->get ( 'username' )
				] );
				return redirect('/dashboard');
			} else {
				session()->flash ( 'message', "Invalid Credentials , Please try again." );
				return view('auth.login');
			}
		}
	}
	public function register(Request $request) {
		$rules = array (
				'email' => 'required|unique:users|email',
				'name' => 'required|unique:users|alpha_num|min:4',
				'password' => 'required|min:6|confirmed' 
		);
		$validator = Validator::make ( $request->all(), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput();
		} else {
			$user = new User ();
			$user->name = $request->get ( 'name' );
			$user->email = $request->get ( 'email' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->remember_token = $request->get ( '_token' );

			$user->save ();
			return redirect('/dashboard');
		}
	}
	public function logout(Request $request) {
        auth()->logout();
        session()->flush();
        session()->regenerateToken();//csrf token regenerated
		return view('auth.login');
    }
    public function loginForm(){
        if(auth()->check()){
            return redirect('/dashboard');
        }else{
            return view('auth.login');
        }
    }

    public function registerForm(){
        if(auth()->check()){
            return redirect('/dashboard');
        }else{
            return view('auth.register');
        }
    }

    public function dashboard(){
       return view('auth.dashboard');
    }


}