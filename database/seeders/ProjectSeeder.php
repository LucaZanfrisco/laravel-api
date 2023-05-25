<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();
        for($i = 0; $i < 20; $i++){
            $new_tpye = Type::inRandomOrder()->first();

            $project = new Project();

            $project->type_id = $new_tpye->id;
            $project->nome = $faker->sentence(3);
            $project->descrizione = $faker->text(1000);
            $project->data_di_creazione = $faker->date();
            $project->slug = Str::slug($project->nome);
            $project->completato = $faker->boolean();
            $project->riscosso = $faker->boolean();
            $project->save();
        }
    }
}
