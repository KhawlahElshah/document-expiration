<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Personal Documents', 'slug' => 'personal-documents', 'parent_id' => 0, 'image_path' => 'personal-documents']);
        Category::create(['name' => 'Driving License','slug' => 'driving-license', 'parent_id' => 1]);
        Category::create(['name' => 'ID', 'slug' => 'id', 'parent_id' => 1]);
        Category::create(['name' => 'Passport', 'slug' => 'passport', 'parent_id' => 1]);

        Category::create(['name' => 'Insurance', 'slug' => 'insurance', 'parent_id' => 0, 'image_path' => 'insurance']);
        Category::create(['name' => 'Car Insurance', 'slug' => 'car-insurance', 'parent_id' => 2]);
        Category::create(['name' => 'Home Insurance', 'slug' => 'home-insurance', 'parent_id' => 2]);

        Category::create(['name' => 'Company Papers','slug' => 'company-papers', 'parent_id' => 0, 'image_path' => 'company-papers']);
        Category::create(['name' => 'License to practice the profession', 'slug' => 'license-to-practice-the-profession', 'parent_id' => 3]);
        Category::create(['name' => 'Commercial Registration Extractor', 'slug' => 'commercial-registration-extractor', 'parent_id' => 3]);
        Category::create(['name' => 'Chamber of Commerce extract', 'slug' => 'chamber-of-commerce-extract', 'parent_id' => 3]);
        Category::create(['name' => 'Tax Declaration', 'slug' => 'tax-declaration', 'parent_id' => 3]);
        Category::create(['name' => 'Statistical code', 'slug' => 'statistical-code', 'parent_id' => 3]);
        Category::create(['name' => 'Social Security Subscription', 'slug' => 'social-security-subscription', 'parent_id' => 3]);

        
        Category::create(['name' => 'Health', 'slug' => 'health', 'parent_id' => 0, 'image_path' => 'health']);
        Category::create(['name' => 'CheckUps', 'slug' => 'checkups', 'parent_id' => 4]);
        Category::create(['name' => 'Gym', 'slug' => 'gym', 'parent_id' => 4]);
        Category::create(['name' => 'Health Funds', 'slug' => 'health-funds', 'parent_id' => 4]);
        Category::create(['name' => 'Vaccination', 'slug' => 'vaccination', 'parent_id' => 4]);

        Category::create(['name' => 'Subscriptions', 'slug' => 'subscriptions', 'parent_id' => 0, 'image_path' => 'subscriptions']);
        Category::create(['name' => 'Gaming', 'slug' => 'gaming', 'parent_id' => 5]);
        Category::create(['name' => 'Software', 'slug' => 'software', 'parent_id' => 5]);
        Category::create(['name' => 'Domain', 'slug' => 'domain', 'parent_id' => 5]);
        Category::create(['name' => 'Internet', 'slug' => 'internet', 'parent_id' => 5]);
        Category::create(['name' => 'SIM', 'slug' => 'sim', 'parent_id' => 5]);
        Category::create(['name' => 'Mobile', 'slug' => 'mobile', 'parent_id' => 5]);

        Category::create(['name' => 'Energy Plan', 'slug' => 'energy-plan', 'parent_id' => 0, 'image_path' => 'energy-plan']);
        Category::create(['name' => 'Electricity', 'slug' => 'electricity', 'parent_id' => 6]);

    }
}