<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Category::create(['name'=>'laptop','slug'=>'laptop','description'=>'laptop category','image'=>'files/photo1.jpg']);
        Category::create(['name' => 'mobile phone', 'slug' => 'mobile-phone', 'description' => 'mobile phone category', 'image' => 'files/photo1.jpg']);
        Category::create(['name' => 'books', 'slug' => 'books', 'description' => 'books category', 'image' => 'files/photo1.jpg']);

        Subcategory::create(['name'=>'dell','category_id'=>1]);
        Subcategory::create(['name' => 'hp', 'category_id' => 1]);
        Subcategory::create(['name' => 'lenevo', 'category_id' => 1]);

        Product::create([
            'name'=>'Hp laptops austraila',
            'image'=>'product/photo2.jpg',
            'price'=>rand(700,1000),
            'description'=>'This is the description of a product',
            'additional_info'=>'this is the addtional information',
            'category_id'=>1,
            'subcategory_id'=>2

        ]);

        Product::create([
            'name' => 'DELL laptops austraila',
            'image' => 'product/photo2.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'this is the addtional information',
            'category_id' => 1,
            'subcategory_id' => 1

        ]);

        Product::create([
            'name' => 'DELL laptops austraila',
            'image' => 'product/photo3.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'this is the addtional information',
            'category_id' => 1,
            'subcategory_id' => 1

        ]);

        User::create([
            'name'=>'LaraAdmin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>now(),
            'address'=>'Australia',
            'phone_number'=>'44203',
            'is_admin'=>1

        ]);
    }
}
