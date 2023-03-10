<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('source')->insert($this->getDate());
    }

    public function getDate(): array
    {
        $date = [];
        for ($i = 0; $i < 10; $i++) {
            $date[] = [
                'name_source' => \fake()->name(),
                'link' => \fake()->url(),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $date;
    }
}
