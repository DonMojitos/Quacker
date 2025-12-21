<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view ("auth.login");
    }
    
    public function store(SessionRequest $request) {

        $attributes = $request->validated();

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'error_validacion' => 'Su correo o contraseña son inválidos.'
            ]);
        }

        request()->session()->regenerate();

        return redirect ('/quacks');
    }
    
    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }
}
