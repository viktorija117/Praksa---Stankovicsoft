<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    // app/Http/Controllers/Auth/LoginController.php

    public function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'director':
                return redirect()->route('director.dashboard');
            case 'professor':
                return redirect()->route('professor.dashboard');
            case 'student':
                return redirect()->route('student.dashboard');
            default:
                return redirect()->route('home');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
