<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = BlogCategory::all();
        $users = User::all();
        $images = Storage::files('public/sample-images');

        for ($i = 1; $i <= 20; $i++) {
            $featuredImage = null;

            try {
                $response = Http::get('https://picsum.photos/800/600');
                if ($response->successful()) {
                    $imageName = uniqid() . '.jpg';
                    $imagePath = 'post-images/' . $imageName;
                    Storage::disk('public')->put($imagePath, $response->getBody());
                    $featuredImage = 'post-images/' . $imageName;
                }
            } catch (\Exception $e) {
                $this->command->error('Failed to download image for blog post. Error: ' . $e->getMessage());
            }

            BlogPost::create([
                'title' => 'Blog Post ' . $i,
                'slug' => 'blog-post-' . $i,
                'content' => 'Content for blog post ' . $i,
                'views' => rand(0, 1000),
                'author_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'is_published' => rand(0, 1),
                'published_at' => Carbon::now()->subDays(rand(0, 365)),
                'featured_image' => $featuredImage ?: ($images ? substr($images[array_rand($images)], 7) : null), // Remove 'public/' from path
            ]);
        }
    }
}
