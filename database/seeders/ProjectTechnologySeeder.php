<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $technologies = Technology::all()->pluck("id");

        foreach ($projects as $project) {
            $randomTechnologies = $technologies->random(rand(2, 4));
            $project->technologies()->attach($randomTechnologies);
        }
    }
}
