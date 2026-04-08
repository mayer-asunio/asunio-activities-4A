<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'student_id' => 'required|string|max:20',
        'first_name' => 'required|string|max:50',
        'last_name'  => 'required|string|max:50',
        'email'      => 'required|email|unique:students,email',
        'password'   => 'required|min:6',
        'gender'     => 'required|in:Male,Female',
        'birthdate'  => 'required|date',
        'address'    => 'required|string|max:255',
        'phone'      => 'required|numeric',
        'course'     => 'required|string|max:100',
        'year_level' => 'required|integer|min:1|max:12',
    ]);

    $id = DB::table('students')->insertGetId([
        'student_id' => $request->student_id,
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'gender'     => $request->gender,
        'birthdate'  => $request->birthdate,
        'address'    => $request->address,
        'phone'      => $request->phone,
        'course'     => $request->course,
        'year_level' => $request->year_level,
        'created_at' => now()
    ]);

    $this->log($id, "REGISTER", "User registered");

    return redirect('/login')->with('success', 'Registered Successfully');
    }

    public function login(Request $request)
    {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = DB::table('students')->where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'This email is not registered'])->withInput();
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Incorrect password'])->withInput();
    }

    Session::put('user', $user);
    $this->log($user->id, "LOGIN", "User logged in");

    return redirect('/dashboard');
    }

    public function logout()
    {
        $user = Session::get('user');
        if($user){
            $this->log($user->id, "LOGOUT", "User logged out");
        }

        Session::forget('user');

        return redirect('/login');
    }

    private function log($userId, $action, $desc)
    {
        DB::table('logs')->insert([
            'user_id' => $userId,
            'action' => $action,
            'description' => $desc,
            'created_at' => now()
        ]);
    }
}