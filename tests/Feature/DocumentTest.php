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
    function a_user_can_add_document_to_get_reminded_about()
    {
        $this->actingAs(factory('App\User')->create());
        $document = factory('App\Document')->raw();

        $this->get('/documents/create')->assertOk();
        $this->post("/documents", array_merge($document, [
            'notify_before_number_days' => 10
        ]))
            ->assertRedirect('/documents');

        $this->assertDatabaseHas("documents", [
            'name'        => $document['name'],
            'notes'       => $document['notes'],
            'expiry_date' => $document['expiry_date'],
            'user_id'     => auth()->id()
        ]);

        $this->assertDatabaseHas("reminders", [
            'document_id'           => 1,
            'notify_before_number_days' => 10
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