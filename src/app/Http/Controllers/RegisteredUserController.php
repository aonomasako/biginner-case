<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function create (RegisterRequest $request)
    {   
        $form = $request->all();
        register::create($form);
        return redirect('auth.registerd');
    }

    public function index ()
    {
        return view ('index');
    }

    public function attendance()
    {
        return view ('attendance');
    }
  
}
