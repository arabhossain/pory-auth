<?php


namespace Pory\Auth\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pory\Auth\Facades\PoryAuth;
use Pory\Auth\Resources\AuthResource;

class AuthController extends Controller
{

    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
            'type'      => 'required'
        ]);

       return new AuthResource(PoryAuth::login($request->all()));
    }

    public function logout()
    {
       return new AuthResource(PoryAuth::logout());
    }
}
