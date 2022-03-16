<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;


interface userInterface
{
    public function register(Request $request);

    public function login(Request $request);
}