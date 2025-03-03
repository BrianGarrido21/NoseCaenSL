<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'C',
            'name' => 'Completed',
            'color' => '#22c55e', // Verde claro
        ]);
        
        Status::create([
            'code' => 'P',
            'name' => 'Pending',
            'color' => '#f59e0b', // Naranja
        ]);
        
        Status::create([
            'code' => 'A',
            'name' => 'Waiting for approval',
            'color' => '#60a5fa', // Azul
        ]);
        
        Status::create([
            'code' => 'R',
            'name' => 'Rejected',
            'color' => '#ef4444', // Rojo
        ]);
        
    }
}
