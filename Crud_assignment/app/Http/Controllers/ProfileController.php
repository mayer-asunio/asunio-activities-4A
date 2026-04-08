<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // Check session manually for dashboard
    public function dashboard()
    {
        $user = Session::get('user');
        if(!$user){
            return redirect('/login')->with('error', 'Please login first');
        }
        return view('dashboard');
    }

    // Edit profile
    public function edit()
    {
        $user = Session::get('user');
        if(!$user){
            return redirect('/login')->with('error', 'Please login first');
        }
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
    $user = Session::get('user');
    if(!$user){
        return redirect('/login')->with('error', 'Please login first');
    }

    $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name'  => 'required|string|max:50',
        'email'      => 'required|email|unique:students,email,' . $user->id,
        'phone'      => 'required|numeric',
        'address'    => 'required|string|max:255',
    ]);

    DB::table('students')
        ->where('id', $user->id)
        ->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'updated_at' => now()
        ]);

    $updatedUser = DB::table('students')->where('id', $user->id)->first();
    Session::put('user', $updatedUser);

    $this->log($user->id, "UPDATE", "Profile updated");

    return redirect('/dashboard')->with('success', 'Profile Updated');
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