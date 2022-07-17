<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Initial'],
            ['name' => 'First Contact'],
            ['name' => 'Interview'],
            ['name' => 'Tech Assignment'],
            ['name' => 'Rejected'],
            ['name' => 'Hired'],
        ];

        foreach ($statuses as $status) {
            Status::create(['name' => $status['name']]);
        }
    }
}
