<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $availableTypes=["Front-end", "Back-end", "Full-stack", "Gaming", "Dev-ops", "Security"];
        foreach ($availableTypes as $typeName) {
            $type = new Type();
            $type->name = $typeName;
            $type->save();
    };
}
}
