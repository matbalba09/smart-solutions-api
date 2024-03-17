<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::insert([
            [
                'name' => 'test_name_01',
                'sr_code' => 'SR202400001',
                'year_level' => '1',
                'department' => 'Accounting',
                'gsuite_email' => 'test_email_01@gmail.com',
                'password' => 'password01',
                'fp_user' => '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAABdgAz/v8AAAFlAYgAxQDFAQAAAFY5gDYAj2deQCUA3XFdgQcBNpRdgJUAzlVbgNAA2JZbgHQAgVxbQJcAn1JbQE8AJVhYgLYBL3FXgIQA5WdXgG0AR1hWQPcAvqVWgHEBE5JWgGgAvWNVgCoBBH1VQPcBJ49UgQ4BKZhUgGEA225UgNYBPXpTgPUAN0dSgI4BBpRSgLwBGYdSgJ0BVLNSQJcBFD5RQO4BUH1RgO4A9JdRQFMBG41QgJsA51RQgG0BMj1PgEQBQjNPgRQAtqROgEEAmQZMgEsBVzpLgH8BRq5KQGMBQp5IQEABN5VHQI4BIzZGQEQBUZlGgIQAEU1FgIMA/HxCgFEBQZlBgJAA+Z88QIQBBpY6gJMBHzg6gMoBZHM3gFEBZJk1AHwBYkQ0AIgBYkYyALEBYhQyAB0BBnUuALABD3gtABsA+HMrAHIBZAArAGABZJsrAE0BSJcqASMAkacqAOIBZ30pAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'test_name_02',
                'sr_code' => 'SR202400002',
                'year_level' => '2',
                'department' => 'Marketing',
                'gsuite_email' => 'test_email_02@gmail.com',
                'password' => 'password02',
                'fp_user' => '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAAA/gAz/v8AAAFlAYgAxQDFAQAAAFYlQI8AV1VigLwANUtgQMAAspFdQEEAi25agOUArD1aQGgAcmBaQI8BC3FZgFcAaQJZgFsAWmJYgDoA749UQHwA5TFSQEEArXpSQIoA+XNRgEsALwJPQE0BHDpPgJIAcqpPgC8BBZNPQB8A4oBOgHIA7ytOgHgArW5NQF0A5y9NgN4AkZRMQLYA14dMgHwA0YVLgHIBJ19LQEoA85RLQN4A4YlJQIoAvZBGgG0A/jFEQG8BD0hCQBsAlnBBQHQA/B1BAHgAyYIzAGEBFKIvAGMBHEAuABoAtHouAH0AxYssAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'test_name_03',
                'sr_code' => 'SR202400003',
                'year_level' => '2',
                'department' => 'IT',
                'gsuite_email' => 'test_email_03@gmail.com',
                'password' => 'password03',
                'fp_user' => '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAABNAAz/v8AAAFlAYgAxQDFAQAAAFYuQGEA0oFkgOEAO0ZjgMYAL09igPkAw5ZhQIIAHF5cQN4BBDVcQDoBHIdagDAAm3ZYQMQBCTdYgQgA3TpYQNgAtjtXQHYAuHVXgHYA2IJXgK8ANalWQHEAwB5WQNYBKj9WgMsBPUtVgNoAfUhRgNEAqJlPgPwA5ZJPgNoAIZ5NQL8BLUZNgJ0A6I9LQKMApV5LgMUAi0tKQHoBH5JKQJsBNDZKQEEBSpJJgJMBIZVIgKMBJaJHgOgBPT9HQIkBLzVDQOEBO0dCgNQBGTZBQNsBFpM9QFwAU2s8QOEBJTw8QJ0A0Z46gJUAzYk2gOIBSFE1AJ0A3ZIyAJcA2X8sAGkBXZgrAIQBJZYrACAAqHUoACAAy3goAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'test_name_04',
                'sr_code' => 'SR202400004',
                'year_level' => '3',
                'department' => 'Engineering',
                'gsuite_email' => 'test_email_04@gmail.com',
                'password' => 'password04',
                'fp_user' => '',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'test_name_05',
                'sr_code' => 'SR202400005',
                'year_level' => '4',
                'department' => 'Criminology',
                'gsuite_email' => 'test_email_05@gmail.com',
                'password' => 'password05',
                'fp_user' => '',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}