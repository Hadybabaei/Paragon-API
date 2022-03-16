<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;





class AuthController extends Controller
{
    private $repository;
 
	public function __construct(userInterface $repository)
	{
	   $this->repository = $repository;
	}

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required',  'max:255'],
            'password' => ['required'],
        ]);
        $this->repository->register($request);
        return response()->json(['message'=>'User Created successfuly'],Response::HTTP_CREATED);
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required',  'max:255'],
            'password' => ['required'],
        ]);
        $this->repository->login($request);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['message'=>'you have logged out successfuly'],Response::HTTP_OK);
    }
}

