<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;





class UserRepository implements userInterface
{
    public function register(Request $request)
    {

        return User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                            ]);
    }
    public function login(Request $request){
    
        if (Auth::attempt($request->only(['email','password'])))
        {
            return response()->json(Auth::user(),Response::HTTP_OK);
        }
        throw ValidationException::withMessages([
            'email'=>'incorrect credential',
        ]);
    }
}   

































?>