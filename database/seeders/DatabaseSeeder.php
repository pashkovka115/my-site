<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(CurrenciesSeeder::class);

        $this->call(CategoryProductsSeeder::class);
        $this->call(CategoriesProductTabsSeeder::class);
        $this->call(CategoriesProductColumnsSeeder::class);
        $this->call(CategoriesProductAdditionalFieldsSeeder::class);

        $this->call(ProductsSeeder::class);
        $this->call(ProductsAdditionalFieldsSeeder::class);

        $this->call(FeedbackSeeder::class);

        $this->call(PageSeeder::class);

        $this->call(FeedbackSeeder::class);

        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);

        $this->call(ProductAttrOptionSeeder::class);
        $this->call(ProductAttrPropertiesSeeder::class);
        $this->call(ProductAttrOptionValueSeeder::class);
    }
}
