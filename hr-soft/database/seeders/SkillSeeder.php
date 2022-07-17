<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'PHP'],
            ['name' => 'C#'],
            ['name' => 'React'],
            ['name' => 'Vue.js'],
            ['name' => 'Node'],
            ['name' => 'Sql'],
        ];

        foreach ($statuses as $status) {
            Skill::updateOrCreate(['name' => $status['name']]);
        }
    }
}
