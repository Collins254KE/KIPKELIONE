<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Application;      // <-- correct model namespace
use App\Mail\sendContact;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Only protect routes that require login.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'apps']);
    }

    /**
     * Dashboard
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Contact Form
     */
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'phone' => 'required',
        ]);

        $email = User::where('role', 'admin')->value('email');

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        Mail::to($email)->send(new sendContact($data));

        return view('contact')->with('successMsg', 'Message sent Successfully');
    }

    /**
     * Application Status Page
     */
    public function status()
    {
        return view('status');
    }

    /**
     * Apply Page - MUST PASS $applications
     */
    public function apply()
    {
        $sessionId = session()->getId();

        if (Auth::check()) {
            $applications = Application::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $applications = Application::where('session_id', $sessionId)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('apply', compact('applications'));
    }

    /**
     * Scholarship Form Page
     */
    public function scholarship()
    {
        return view('scholarship');
    }

    /**
     * Download Page
     */
    public function download()
    {
        return view('download');
    }

    /**
     * Student Welcome Page
     */
    public function student()
    {
        return view('welcome');
    }

    /**
     * Dashboard App Count
     */
    public function apps()
    {
        $apps = Application::where('status', 0)
            ->where('user_id', Auth::id())
            ->count();

        return view('layout.dashboard', compact('apps'));
    }
}
