<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class UsersController extends Controller
{
    private $repository;
 
	public function __construct(userInterface $repository)
	{
	   $this->repository = $repository;
	}
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
        $this->repository->store($request);
        // resolve(UserRepository::class)->create($request);
        return response()->json(['message'=>'User Created successfuly'],Response::HTTP_CREATED);
    }


}

