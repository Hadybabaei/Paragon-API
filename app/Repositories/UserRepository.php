<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;



class UserRepository implements userInterface
{
    public function store(Request $request)
    {

        return User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                            ]);
    }
}

































?>