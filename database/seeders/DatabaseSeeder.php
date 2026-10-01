<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'id' => 4,
                'name' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        $asep = User::firstOrCreate(
            ['email' => 'asep@gmail.com'],
            [
                'id' => 3,
                'name' => 'asep',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        );

        $saski = User::firstOrCreate(
            ['email' => 'saski@gmail.com'],
            [
                'id' => 5,
                'name' => 'saski',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Events
        $eventNoah = Event::firstOrCreate(
            ['slug' => 'konser-noah'],
            [
                'id' => 2,
                'name' => 'Konser Noah',
                'start' => '2026-11-15',
                'end' => '2026-11-16',
                'description' => 'Konser eksklusif Noah live in Jakarta dengan penampilan spektakuler membawakan deretan lagu hits terbaik sepanjang masa.',
                'price' => 200000,
                'photo' => 'bONygqBXUbLjnQfVE9OK8q93m4SjJ2xpE2cKHqK7.jpg',
                'status' => 'Opened',
            ]
        );

        $eventColdplay = Event::firstOrCreate(
            ['slug' => 'konser-coldplay'],
            [
                'id' => 3,
                'name' => 'Konser Coldplay',
                'start' => '2026-12-20',
                'end' => '2026-12-21',
                'description' => 'Music of the Spheres World Tour Coldplay menghadirkan pengalaman visual dan panggung yang luar biasa bagi seluruh penggemar.',
                'price' => 500000,
                'photo' => 'DFoeR28RkN5I4u269unD1BtC0kcZNRd04HChtOX5.jpg',
                'status' => 'Opened',
            ]
        );

        // 3. Transactions
        Transaction::firstOrCreate(
            [
                'user_id' => $saski->id,
                'event_id' => $eventNoah->id,
            ],
            [
                'price' => $eventNoah->price,
                'status' => 'Paid',
            ]
        );

        Transaction::firstOrCreate(
            [
                'user_id' => $admin->id,
                'event_id' => $eventNoah->id,
            ],
            [
                'price' => $eventNoah->price,
                'status' => 'Pending',
            ]
        );
    }
}
