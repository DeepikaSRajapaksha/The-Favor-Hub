<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuCategory;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = MenuCategory::firstOrCreate(['name' => 'Beverage'], [
            'description' => 'Refreshing drinks to complement your meal',
        ]);

        Menu::create([
            'name' => 'Iced Coffee',
            'category_id' => $category->id,
            'description' => 'Cold brewed coffee with ice and milk.',
            'price' => 'Rs.150',
            'image' => 'iced_coffee.jpg'
        ]);

        Menu::create([
            'name' => 'Fried Rice',
            'category_id' => MenuCategory::firstOrCreate(['name' => 'Rice'])->id,
            'description' => 'Aromatic fried rice with vegetables and eggs.',
            'price' => 'Rs.450',
            'image' => 'fried_rice.jpg'
        ]);
    }
}
