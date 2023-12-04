<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'First Post',
                'excerpt' => 'Summary of the First Post',
                'body' => 'Body of First Post',
                'image_path' => 'Empty',
            ],
            [
                'title' => 'Second Post',
                'excerpt' => 'Summary of the Second Post',
                'body' => 'Body of Second Post',
                'image_path' => 'Empty',
            ]
        ];           
        
        foreach($posts as $key => $value) {
            Post::create($value);
        } 
    }
}
