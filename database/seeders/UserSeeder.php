<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrTypes = array(
            array(
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ),
        );
        foreach ($arrTypes as $types) {
            User::factory()->create($types);
        }
    }
}
