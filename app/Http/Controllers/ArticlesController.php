<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\Interfaces\articleInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    public function __construct(articleInterface $repository)
	{
	   $this->repository = $repository;
	}
    public function show()
    {
        return response()->json(['data'=>$this->repository->show()],Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required',  'max:255'],
            'body' => ['required'],
            'category_id'=>['required'],
        ]);
        $this->repository->store($request);
        return response()->json(['message'=>"Article Created",200]);
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required',  'max:255'],
            'body' => ['required'],
            'category_id'=>['required'],
        ]);
        $this->repository->update($id,$request);
        return response()->json(['message'=>"Article updated",Response::HTTP_OK]);
    }
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return response()->json(['message'=>'Article Deleted',Response::HTTP_OK]);
    }
}
