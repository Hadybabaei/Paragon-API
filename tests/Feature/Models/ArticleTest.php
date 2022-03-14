<?php

namespace Tests\Feature\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    use AuthenticableTrait;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_avaleblity()
    {
        Article::factory()->count(1)->create();
        $this->assertDatabaseCount('articles',1);
    }
    public function test_Article_get()
    {
        $response=$this->get(route('get_articles'));
        $response->assertStatus(Response::HTTP_OK);
    }
    public function test_article_Creation_auth_check()
    {
        $response=$this->postJson(route('article-store'),[
            'title' =>'test' ,
            'description' => "lorem morem",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nequora odit. Obcharum. Debitis!",
            'category_id'=>1,
        ]);
        $response->assertStatus(401);
    }
    public function test_article_can_be_deleted()
    {
        Article::factory()->count(1)->create();
        Article::find(2)->delete();
        $this->assertDatabaseCount('articles',1);
    }
}
