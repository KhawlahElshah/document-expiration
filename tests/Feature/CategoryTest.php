<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    function user_can_list_his_documents_categories()
    {
        $this->actingAs(factory('App\User')->create());
        $documents = factory('App\Document', 2)->create(['user_id' => auth()->user()->id]);

        $another_user_documents = factory('App\Document')->create();

        $this->get('/categories')
            ->assertSee($documents->first()->category->name)
            ->assertSee($documents->last()->category->name)
            ->assertDontSee($another_user_documents->category->name);
    }
}