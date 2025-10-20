<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuApiController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();
        return response()->json($menus);
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        return $menu 
            ? response()->json($menu) 
            : response()->json(['message' => 'Not Found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:menu_categories,id',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        $menu = Menu::create($data);
        return response()->json(['message' => 'Created', 'menu' => $menu], 201);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if (!$menu) return response()->json(['message' => 'Not Found'], 404);

        $menu->update($request->all());
        return response()->json(['message' => 'Updated', 'menu' => $menu]);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (!$menu) return response()->json(['message' => 'Not Found'], 404);

        $menu->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

