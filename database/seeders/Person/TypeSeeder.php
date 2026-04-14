<?php

namespace Database\Seeders\Person;

use App\Models\Person\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrTypes = array(
            array(
                'id' => 1,
                'name' => 'Física',
                'system' => true,
            ),
            array(
                'id' => 2,
                'name' => 'Jurídica',
                'system' => true,
            ),
        );
        foreach ($arrTypes as $types) {
            Type::factory()->create($types);
        }
    }
}
