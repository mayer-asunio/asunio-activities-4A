<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function oddEvenForm()
    {
        return view('oddeven');
    }

    public function checkOddEven(Request $request)
    {
        $number = $request->number;
        $result = ($number % 2 == 0) ? "EVEN" : "ODD";
        return view('oddeven', compact('number', 'result'));
    }

    public function multiplicationForm()
    {
        return view('multiplication');
    }

    public function generateTable(Request $request)
    {
        $row = $request->row;
        $col = $request->col;
        return view('multiplication', compact('row', 'col'));
    }

    public function loginForm()
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username == "juan" && $password == "petra") {
            $message = "Login Successful!";
            $status = "success";
        } else {
            $message = "Login Failed!";
            $status = "error";
        }

        return view('login', compact('message', 'status'));
    }

    public function registerForm()
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        $firstname = $request->firstname;
        $middlename = $request->middlename;
        $lastname = $request->lastname;
        $address = $request->address;
        $birthdate = date("F d, Y", strtotime($request->birthdate));

        return view('register', compact(
            'firstname',
            'middlename',
            'lastname',
            'address',
            'birthdate'
        ));
    }
}