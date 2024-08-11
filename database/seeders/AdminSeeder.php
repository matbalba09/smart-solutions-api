<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::truncate();
        Admin::insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'fp_user' => '<?xml version="1.0" encoding="UTF-8"?><Fid><Bytes>Rk1SACAyMAABdgAz/v8AAAFlAYgAxQDFAQAAAFY5gDYAj2deQCUA3XFdgQcBNpRdgJUAzlVbgNAA2JZbgHQAgVxbQJcAn1JbQE8AJVhYgLYBL3FXgIQA5WdXgG0AR1hWQPcAvqVWgHEBE5JWgGgAvWNVgCoBBH1VQPcBJ49UgQ4BKZhUgGEA225UgNYBPXpTgPUAN0dSgI4BBpRSgLwBGYdSgJ0BVLNSQJcBFD5RQO4BUH1RgO4A9JdRQFMBG41QgJsA51RQgG0BMj1PgEQBQjNPgRQAtqROgEEAmQZMgEsBVzpLgH8BRq5KQGMBQp5IQEABN5VHQI4BIzZGQEQBUZlGgIQAEU1FgIMA/HxCgFEBQZlBgJAA+Z88QIQBBpY6gJMBHzg6gMoBZHM3gFEBZJk1AHwBYkQ0AIgBYkYyALEBYhQyAB0BBnUuALABD3gtABsA+HMrAHIBZAArAGABZJsrAE0BSJcqASMAkacqAOIBZ30pAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'admin2',
                'username' => 'admin2',
                'password' => Hash::make('admin2'),
                'fp_user' => '<?xml version="1.0" encoding="UTF-8"?><Fid><Bytes>Rk1SACAyMAABdgAz/v8AAAFlAYgAxQDFAQAAAFY5gDYAj2deQCUA3XFdgQcBNpRdgJUAzlVbgNAA2JZbgHQAgVxbQJcAn1JbQE8AJVhYgLYBL3FXgIQA5WdXgG0AR1hWQPcAvqVWgHEBE5JWgGgAvWNVgCoBBH1VQPcBJ49UgQ4BKZhUgGEA225UgNYBPXpTgPUAN0dSgI4BBpRSgLwBGYdSgJ0BVLNSQJcBFD5RQO4BUH1RgO4A9JdRQFMBG41QgJsA51RQgG0BMj1PgEQBQjNPgRQAtqROgEEAmQZMgEsBVzpLgH8BRq5KQGMBQp5IQEABN5VHQI4BIzZGQEQBUZlGgIQAEU1FgIMA/HxCgFEBQZlBgJAA+Z88QIQBBpY6gJMBHzg6gMoBZHM3gFEBZJk1AHwBYkQ0AIgBYkYyALEBYhQyAB0BBnUuALABD3gtABsA+HMrAHIBZAArAGABZJsrAE0BSJcqASMAkacqAOIBZ30pAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
            [
                'name' => 'test_name_03',
                'username' => 'sample03',
                'password' => Hash::make('password03'),
                'fp_user' => '<?xml version="1.0" encoding="UTF-8"?><Fid><Bytes>Rk1SACAyMAABdgAz/v8AAAFlAYgAxQDFAQAAAFY5gDYAj2deQCUA3XFdgQcBNpRdgJUAzlVbgNAA2JZbgHQAgVxbQJcAn1JbQE8AJVhYgLYBL3FXgIQA5WdXgG0AR1hWQPcAvqVWgHEBE5JWgGgAvWNVgCoBBH1VQPcBJ49UgQ4BKZhUgGEA225UgNYBPXpTgPUAN0dSgI4BBpRSgLwBGYdSgJ0BVLNSQJcBFD5RQO4BUH1RgO4A9JdRQFMBG41QgJsA51RQgG0BMj1PgEQBQjNPgRQAtqROgEEAmQZMgEsBVzpLgH8BRq5KQGMBQp5IQEABN5VHQI4BIzZGQEQBUZlGgIQAEU1FgIMA/HxCgFEBQZlBgJAA+Z88QIQBBpY6gJMBHzg6gMoBZHM3gFEBZJk1AHwBYkQ0AIgBYkYyALEBYhQyAB0BBnUuALABD3gtABsA+HMrAHIBZAArAGABZJsrAE0BSJcqASMAkacqAOIBZ30pAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>',
                'created_at' => Helper::getDateNow(),
                'updated_at' => Helper::getDateNow(),
            ],
        ]);
    }
}