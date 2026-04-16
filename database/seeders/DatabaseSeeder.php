<?php

namespace Database\Seeders;

use Database\Seeders\Person\TypeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
        ]);
        $this->command->info('User seeded!');
        $this->command->info('Person type seeded!');
    }
}
