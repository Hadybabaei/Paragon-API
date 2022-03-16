<?php

namespace Tests\Feature\Models;

use App\Models\Article;
use App\Models\User;
use Faker\Factory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_User_Register_data_validation()
    {
        $response=$this->postJson(route('register'), []);
        $response->assertStatus(422);
    }
    public function test_User_Register()
    {
        $response=$this->postJson(route('register'), [
            'name' => 'sdsdsd',
            'email'=>'asdas@asdasd.com',
            'password'=>'32321asd',
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    public function test_user_login_validation()
    {
        $response=$this->postJson(route('login'), []);
        $response->assertStatus(422);
    }
    public function test_user_can_be_logged()
    {
        $response=$this->postJson(route('login'), [
            'email'=>'asdas@asdasd.com',
            'password'=>'32321asd',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }
    public function test_user_logout()
    {
        $user = User::find(1);
        $response=$this->actingAs($user)->postJson(route('logout'));
        $response->assertStatus(Response::HTTP_OK);
    }
    public function test_user_can_insert_article()
    {
        $user = User::find(1);
        $response=$this->actingAs($user)->postJson(route('article-store'),[
            'title' =>"testi",
            'description' => "testiiiiiiiii",
            'body' => "testiiii",
            'category_id'=>1,
        ]);
        $response->assertStatus(200);
    }
    public function test_user_can_update_article()
    {
        $user = User::find(1);
        $response=$this->actingAs($user)->postJson(route('article-update',1),[
            'title' =>'testttt' ,
            'description' => "lorem moremmm",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nequora odit. Obcharum. Debitis!",
            'category_id'=>1,
        ]);
        $response->assertStatus(200);
    }
    public function test_article_update_input_validation()
    {
        $user = User::find(1);
        $response=$this->actingAs($user)->postJson(route('article-update',1),[]);
        $response->assertStatus(422);
    }
    public function test_authenticated_user_can_delete_articles()
    {
        $user=User::find(1);
        $response=$this->actingAs($user)->postJson(route('article-delete',1));
        $response->assertStatus(Response::HTTP_OK);
    }
}
