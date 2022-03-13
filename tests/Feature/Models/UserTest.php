<?php

namespace Tests\Feature\Models;

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
    public function test_user_Model_Working()
    {
        $response = $this->get('/api/v1/');
 
        $response->assertStatus(Response::HTTP_OK);
    }
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
}
