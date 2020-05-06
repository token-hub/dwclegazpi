<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Images;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            ['image_name' => 'GRADUATE.jpg', 'is_active' => '1', 'number' => 3],
            ['image_name' => 'librarian.jpg', 'is_active' => '1', 'number' => 2],
            ['image_name' => 'SYSTEMCOVER.jpg', 'is_active' => '1', 'number' => 1],
        ];

        foreach ($images as $image) {
            Images::create(array(
                'image_name' => $image["image_name"],
                'is_active' => $image["is_active"],
                'number' => $image["number"],
            ));
        }
    }
}
