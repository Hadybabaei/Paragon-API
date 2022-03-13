<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;


interface userInterface
{
    public function store(Request $request);
}