<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getDate());
    }

    public function getDate(): array
    {
        $date = [];
        for ($i = 0; $i < 10; $i++) {
            $date[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => NewsStatus::DRAFT->value,
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $date;
    }
}
