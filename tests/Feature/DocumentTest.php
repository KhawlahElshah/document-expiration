<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DocumentNearlyExpiring;
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

        $category = factory('App\Category')->create();
        $document = factory('App\Document')->raw();

        $this->get("/categories/{$category->slug}/documents/create")->assertOk();
        $this->post("/categories/{$category->slug}/documents", array_merge($document, [
            'notify_before_number_days' => 10
        ]))
            ->assertRedirect('/home');

        $this->assertDatabaseHas("documents", [
            'title'       => $document['title'],
            'notes'       => $document['notes'],
            'expiry_date' => $document['expiry_date'],
            'user_id'     => auth()->id()
        ]);

        $this->assertDatabaseHas("reminders", [
            'document_id'       => 1,
            'notification_date' => Carbon::create($document['expiry_date'])->subDays(10)
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
    /**
     *@test
     */
    public function users_will_get_email_notification_when_their_notification_day_reaches()
    {
        Notification::fake();

        $document = factory('App\Document')->create();
        $reminder = factory('App\Reminder')->create(['document_id' => $document->id]);

        Carbon::setTestNow($reminder->notification_date);

        $this->artisan('schedule:run');

        Notification::assertSentTo(
            $document->owner,
            DocumentNearlyExpiring::class
        );
    }
}