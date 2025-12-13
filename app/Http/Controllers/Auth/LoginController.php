<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // fallback

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the username method to use a custom login field
     */
    public function username()
    {
        return 'login'; // matches the input name in your login form
    }

    /**
     * Attempt to login using email or phone
     */
    protected function attemptLogin(Request $request)
    {
        $login = $request->input($this->username());
        $password = $request->input('password');

        // Check if login is numeric (phone) or email
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return Auth::attempt([
            $fieldType => $login,
            'password' => $password,
        ], $request->filled('remember'));
    }

    /**
     * Redirect users after login based on role.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        // Regular user
        return redirect()->route('home'); // or your user dashboard
    }
}
