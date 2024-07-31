<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesId = Type::all()->pluck("id");
        for ($i = 0; $i < 50; $i++) {
            $project = new Project();

            $project->name = $faker->sentence(4);
            $project->type_id = $faker->randomElement($typesId);
            $project->description = $faker->sentence(10);
            $project->client = $faker->name();
            $project->start_date = $faker->dateTime("now");
            $project->end_date = $faker->dateTimeThisYear();
            $project->status = $faker->boolean();
            $project->budget = $faker->numberBetween(500, 2500);
            $project->repository = $faker->url();

            // $project->project_manager = $faker->name();

            // $teamMembers = [];
            // for ($j = 0; $j < $faker->numberBetween(1, 4); $j++) {
            //     $teamMembers[] = $faker->name;
            // }

            // $project->team_members = json_encode($teamMembers);

            $project->save();
        }
    }
}
