<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\productsFactory;
use Database\Factories\UserFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\CommentFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Product::factory(10)->create();
        Category::factory(10)->create();
        Comment::factory(10)->create();
    }
}
