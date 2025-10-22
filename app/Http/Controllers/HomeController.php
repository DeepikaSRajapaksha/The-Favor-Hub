<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Latest 3 menu items
        $featuredMenus = Menu::latest()->take(3)->get();

        // Show all categories
        $categories = MenuCategory::all();

        return view('User.Home.index', compact('featuredMenus', 'categories'));
    }
}
