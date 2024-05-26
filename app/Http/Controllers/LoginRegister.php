<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegister extends Controller
{
    public function Loginpage()
    {
        return view('Layouts/login');
    }

    public function Registerpage()
    {
        return view('Layouts/register');
    }
}
