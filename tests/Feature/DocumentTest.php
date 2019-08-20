<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    function a_user_can_have_multiply_documents()
    {
        $this->actingAs(factory('App\User')->create());
        $document = factory('App\Document')->raw();

        $this->get('/documents/create')->assertOk();
        $this->post("/documents", $document)
            ->assertRedirect('/documents');

        $this->assertDatabaseHas("documents", [
            'name'        => $document['name'],
            'notes'       => $document['notes'],
            'expiry_date' => $document['expiry_date'],
            'user_id'     => auth()->id()
        ]);
    }

    /**
     *@test
     */
    function user_can_have_a_Dashboard_showing_states_of_his_documents_count()
    {
        $this->actingAs(factory('App\User')->create());
        $documents = factory('App\Document', 3)->create(['user_id' => auth()->id()]);

        $this->get('/home')
            ->assertSee($documents->count());
    }
}
