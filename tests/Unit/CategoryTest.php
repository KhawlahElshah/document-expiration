<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    function it_has_many_documents()
    {
        $category = factory('App\Category')->create();
        $documents = factory('App\Document', 3)->create(['category_id' => $category->id]);

        $this->assertCount(3, $category->documents);
    }
}
