<?php

namespace Tests\Feature\Models;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
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
}
