<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\articleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class ArticleRepository implements articleInterface
{
    public function show()
    {
        return Article::where('status',1)->get();
    }
    public function store(Request $request)
    {
        return Article::create([
            'title'=>($request->title),
            'slug'=>Str::slug($request->title),
            'description'=>$request->description,
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->category_id,
                    ]);
    }
    public function update($id,Request $request)
    {
        $article=Article::find($id);
        return $article->update([
            'title'=>($request->title),
            'slug'=>Str::slug($request->title),
            'description'=>$request->description,
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->category_id,
        ]);
    }
    public function destroy($id)
    {
       $article=Article::find($id);
       if (!$article)
       {
           $article->delete();
       }else{
        return response()->json(['error'=>"Article not found",404]);
       };
    }
}