<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::truncate();
        Event::insert([
            [
                'event_name' => 'Foundation Day - Morning',
                'event_type' => 1,
                'start_date' => '2024-03-18 08:00:00',
                'end_date' => '2024-03-18 12:00:00',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Foundation Day - Afternoon',
                'event_type' => 1,
                'start_date' => '2024-03-18 13:00:00',
                'end_date' => '2024-03-18 20:00:00',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Library',
                'event_type' => 2,
                'start_date' => '',
                'end_date' => '',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Computer Lab',
                'event_type' => 2,
                'start_date' => '',
                'end_date' => '',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
