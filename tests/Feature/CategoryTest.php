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
    function users_can_list_main_categories_to_choose_which_one_they_will_add_their_documents_to()
    {
        $this->actingAs(factory('App\User')->create());
        $categories = factory('App\Category', 2)->create(['parent_id' => 0]);

        $this->get('/categories')
            ->assertSee($categories->first()->name)
            ->assertSee($categories->last()->name);
    }
}