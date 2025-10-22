<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\Menu;

class UserMenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::latest()->get();
        $menus = Menu::with('category')->latest()->get();

        return view('User.Menu.index', compact('categories', 'menus'));
    }
}
