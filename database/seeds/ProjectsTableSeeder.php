<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Project');

        for($i = 1; $i <= 10; $i ++){

            DB::table('projects')->insert([
                'project_name' => $faker->sentence,
                'project_description' => implode($faker->paragraphs(2)),
                'project_creation_date' => \Carbon\Carbon::now(),
                'author_name' => $faker->sentence,
            ]);
        }
    }
}
