<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {


    $title= $this->faker->text(200);
    $slug = \Illuminate\Support\Str::slug($title) . "-" .uniqid();
    $description = $this->faker->text(1000);
    $excerpt = \Illuminate\Support\Str::words($description,50);
    return [
        "title"=>$title,
        "slug"=>$slug,
        "description"=>$description,
        "excerpt"=>$excerpt,
        "user_id"=>\App\User::all()->random()->id,
        "category_id"=>\App\Category::all()->random()->id,
    ];
});
