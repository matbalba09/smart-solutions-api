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
                'attendance_type' => '',
                'organizer' => '',
                'venue' => '',
                'start_date' => '2024-04-26 18:00:00',
                'end_date' => '2024-04-26 18:01:00',
                'is_deleted' => 0,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Foundation Day - Afternoon',
                'event_type' => 1,
                'attendance_type' => '',
                'organizer' => '',
                'venue' => '',
                'start_date' => '2024-03-18 13:00:00',
                'end_date' => '2024-03-18 20:00:00',
                'is_deleted' => 0,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Library',
                'event_type' => 2,
                'attendance_type' => '',
                'organizer' => '',
                'venue' => '',
                'start_date' => '',
                'end_date' => '',
                'is_deleted' => 0,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'event_name' => 'Computer Lab',
                'event_type' => 2,
                'attendance_type' => '',
                'organizer' => '',
                'venue' => '',
                'start_date' => '',
                'end_date' => '',
                'is_deleted' => 0,
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}
