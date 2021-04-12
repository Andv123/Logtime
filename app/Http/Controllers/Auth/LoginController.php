<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Overtime;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    //view page login
    public function getLogin() {
        if (isset(Auth::User()->id)) {
            $id = Auth::User()->id;
            $user = User::find($id);//dd($user);
            if ($user->role == 1) {
                return redirect('admin/home');
            } else {
                return redirect('page/home');
            }
        }
        return view('login');
    }

    // post login
    public  function postLogin(Request $request) {
        $this->validate($request,
            [
                'name' => 'required|min:6|max:50',
                'password' => 'required|min:3|max:16'
            ],
            [
                'name.required' => 'Please enter username',
                'name.min' => 'Username min 6 characters',
                'name.max' => 'Username max 50 characters',
                'password.required' => 'Please enter password',
                'password.min' => 'Password min 3 characters',
                'password.max' => 'password max 16 characters'
            ]);
        $remember = ($request['remember-me']) ? true : false;
        $name = $request->name;
        $pass = $request->password;
        if ($remember === true) {
            setcookie('name', $name, time() +(3600*24));
            setcookie('pass', $pass, time() +(3600*24));
        } else {
            setcookie('name', $name, time() -1);
            setcookie('pass', $pass, time() -1);
        }
        if (Auth::attempt(['user_name' => $name, 'password' => $pass, 'role' => 1], $remember)) {
            return redirect('admin/home');
        } elseif (Auth::attempt(['user_name' => $name, 'password' => $pass, 'role' => 0],
            $remember)) {
            return redirect('page/home');
        } else {
            return redirect('page/login')->with('global',
                'Incorrect username or password. Please try again.');
        }
    }

    //logout page
    public  function getLogout() {
        //dd($_COOKIE);

        if (isset(Auth::User()->id)) {
            $id = Auth::User()->id;
            $ot = Overtime::where('user_id',$id)->get();
            foreach ($ot as $over) {
                if ($over->work == null) {
                    Overtime::find($over->id)->delete();
                }
            }
        }
        Auth::logout();
        return redirect('page/login');
    }
}
