<?php

namespace Tests\Unit;

use App\Category;
use App\Document;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    function it_belongs_to_category()
    {
        $category = factory('App\Category')->create();
        $document = factory('App\Document')->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $document->category);
    }

    /**
     *@test
     */
    function it_knows_its_status_title()
    {
        $this->withoutExceptionHandling();
        $expired_document = factory('App\Document')->create(['expiry_date' => today()->subDays(60)]);

        $warned_document = factory('App\Document')->create(['expiry_date' => today()->addDays(20)]);
        $warnderDocumentReminder = factory('App\Reminder')->create([
            'notification_date' => $warned_document->expiry_date->subDays(20),
            'document_id'       => $warned_document->id
        ]);

        $active_document = factory('App\Document')->create(['expiry_date' => today()->addDays(60)]);

        $this->assertCount(1, Document::expired()->get());
        $this->assertCount(1, Document::warned()->get());
        $this->assertCount(1, Document::active()->get());
        $this->assertCount(2, Document::notExpired()->get());
    }

    /**
     *@test
     */
    public function it_has_many_reminders()
    {
        $document = factory('App\Document')->create();

        $document->saveReminder($number_of_days_to_notify_before = 5);

        $this->assertInstanceOf('App\Reminder', $document->reminders()->first());
        $this->assertCount(1, $document->reminders);
    }

    /**
     *@test
     */
    public function it_belongs_to_an_owner()
    {
        $owner = factory('App\User')->create();
        $document = factory('App\Document')->create(['user_id' => $owner->id]);

        $this->assertInstanceOf(User::class, $document->owner);
    }
}