<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 20;

        if($id === null){
            for($i = 1; $i < $quantityNews; $i++){
                $news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }

        return [
            'id' => $id,
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];
    }

    public function getCategories(int $id = null): array
    {
        $categories = [];
        $quantityCategories = 10;

        if($id === null)
        {
            for ($i = 1; $i < $quantityCategories; $i++)
            {
                $categories[$i] = [
                    'id' => $i,
                    'categories_id' => \fake()->unique()->randomDigit(),
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100)
                ];
            }

            return $categories;
        }

        return [
            'id' => $id,
            'categories_id' => \fake()->unique()->randomDigit(),
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100)
        ];
    }

}
