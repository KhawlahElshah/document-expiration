<?php

namespace Tests\Unit;

use App\Category;
use App\Document;
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
        $expired_document = factory('App\Document')->create(['expiry_date' => today()->subDays(60)]);
        $warned_document = factory('App\Document')->create(['expiry_date' => today()->addDays(30)]);
        $active_document = factory('App\Document')->create(['expiry_date' => today()->addDays(60)]);

        $this->assertCount(1, Document::expired()->get());
        $this->assertCount(1, Document::warned()->get());
        $this->assertCount(1, Document::active()->get());
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
}