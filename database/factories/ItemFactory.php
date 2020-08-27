<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
       'codeno' =>$faker->randomNumber(5),
       'name' =>$faker->name,
       'photo' => 'backendtemplate/itemimg' . $faker->image('public/backendtemplate/itemimg',50,50,'cats',false),
       'price' =>$faker->randomNumber(5),
       'discount' =>$faker->randomNumber(2),
       'description' =>$faker->text,
       'subcategory_id' => random_int(\DB::table('subcategories')->min('id'),\DB::table('subcategories')->max('id')),
       'brand_id' => random_int(\DB::table('brands')->min('id'),\DB::table('brands')->max('id'))
    ];
});
