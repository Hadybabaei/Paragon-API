<?php

namespace Tests\Feature\Models;

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
        $response=$this->json('post', '/api/v1/user/store', []);
        $response->assertStatus(422);
    }
    public function test_User_Creation()
    {
        $response=$this->json('post', '/api/v1/user/store', [
            'name' => 'sdsdsd',
            'email'=>'asdas@asdasd.com',
            'password'=>'32321asd',
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
}
