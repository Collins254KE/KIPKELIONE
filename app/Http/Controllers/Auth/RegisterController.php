<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // make sure this Blade exists
    }

    /**
     * Handle a registration request.
     */
  public function register(Request $request)
{
    $this->validator($request->all())->validate();
    $this->create($request->all());

    // Redirect to login with success message
    return redirect()->route('login')
                     ->with('success', 'Registration successful. Please login.');
}


    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'id_number' => ['required', 'numeric', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'place' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        return User::create([
            'fname'     => $data['fname'],
            'lname'     => $data['lname'],
            'email'     => $data['email'],
            'id_number' => $data['id_number'],
            'phone'     => $data['phone'],
            'place'     => $data['place'],
            'password'  => Hash::make($data['password']),
            'role'      => 'student',     // default role
            'is_admin'  => false,         // default admin status
        ]);
    }
}
