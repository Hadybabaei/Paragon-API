<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index()
    {
        return response()->json(
            ['message'=>'it works'],
            Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required',  'max:255'],
            'password' => ['required'],
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return response()->json(['message'=>'User Created successfuly'],Response::HTTP_CREATED);
    }
}
