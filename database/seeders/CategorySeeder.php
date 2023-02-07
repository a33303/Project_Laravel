<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getDate());
    }

    public function getDate(): array
    {
        $date = [];
        for ($i = 0; $i < 7; $i++) {
            $date[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $date;
    }
}
