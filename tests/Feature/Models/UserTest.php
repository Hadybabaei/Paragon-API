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
    public function test_User_data_validation()
    {
        $response=$this->json('post', '/api/v1/user/register', []);
        $response->assertStatus(422);
    }
    public function test_User_Register()
    {
        $response=$this->json('post', '/api/v1/user/register', [
            'name' => 'sdsdsd',
            'email'=>'asdas@asdasd.com',
            'password'=>'32321asd',
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    public function test_user_login_validation()
    {
        $response=$this->json('post', '/api/v1/user/login', []);
        $response->assertStatus(422);
    }
    public function test_user_can_be_logged()
    {
        $response=$this->json('post', '/api/v1/user/login', [
            'email'=>'asdas@asdasd.com',
            'password'=>'32321asd',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }
    
}
