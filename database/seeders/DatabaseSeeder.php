<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'password' => bcrypt('password123'),
            ],
        ]);

        // Seed rooms
        DB::table('rooms')->insert([
            [
                'image' => 'room1.jpg',
                'room_num' => '101',
                'type' => 'single',
                'room_desc' => 'A cozy single room.',
                'price' => 1000,
            ],
            [
                'image' => 'room2.jpg',
                'room_num' => '102',
                'type' => 'double',
                'room_desc' => 'A spacious double room.',
                'price' => 2000,
            ],
            [
                'image' => 'room3.jpg',
                'room_num' => '103',
                'type' => 'single',
                'room_desc' => 'A budget-friendly single room.',
                'price' => 800,
            ],
        ]);

        // Seed bookings
        DB::table('bookings')->insert([
            [
                'user_id' => 1,
                'room_id' => 1,
                'start_date' => '2025-03-15',
                'end_date' => '2025-03-20',
                'total' => 5000,
            ],
            [
                'user_id' => 2,
                'room_id' => 2,
                'start_date' => '2025-03-10',
                'end_date' => '2025-03-15',
                'total' => 10000,
            ],
            [
                'user_id' => 3,
                'room_id' => 3,
                'start_date' => '2025-03-05',
                'end_date' => '2025-03-10',
                'total' => 4000,
            ],
        ]);

        // Seed payments
        DB::table('payments')->insert([
            [
                'booking_id' => 1,
                'amount' => 5000,
            ],
            [
                'booking_id' => 2,
                'amount' => 10000,
            ],
            [
                'booking_id' => 3,
                'amount' => 4000,
            ],
        ]);
    }
}
