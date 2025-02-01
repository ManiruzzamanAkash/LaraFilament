<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health',
            'Travel',
            'Food',
            'Lifestyle',
        ];

        $descriptions = [
            'Technology' => 'Latest updates and insights on technology, gadgets, and software.',
            'Health' => 'Tips and advice on maintaining a healthy lifestyle and well-being.',
            'Travel' => 'Guides and stories from around the world to inspire your next adventure.',
            'Food' => 'Delicious recipes, cooking tips, and food reviews.',
            'Lifestyle' => 'Articles on fashion, home decor, and personal development.',
        ];

        foreach ($categories as $category) {
            $imagePath = null;

            try {
                $response = Http::get('https://picsum.photos/800/600');
                if ($response->successful()) {
                    $imageName = uniqid() . '.jpg';
                    $imagePath = 'category-images/' . $imageName;
                    Storage::disk('public')->put($imagePath, $response->getBody());
                }
            } catch (\Exception $e) {
                $this->command->error('Failed to download image for category. Error: ' . $e->getMessage());
            }

            BlogCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => $descriptions[$category],
                'image' => $imagePath, // Assuming you have an 'image' column in your BlogCategory model
            ]);
        }
    }
}
