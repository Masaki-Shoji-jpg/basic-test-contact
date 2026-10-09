<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Tag;
use App\Models\Category;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()
            ->count(20)
            ->hasAttached(Tag::all()->random(rand(1, 3)))
            ->create();
    }
}
