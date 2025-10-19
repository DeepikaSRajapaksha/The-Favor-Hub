<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MenuCategory::latest()->get();
        return view('admin.menuCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menuCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menu_categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menuCategory'), $filename);
            $data['image'] = $filename;
        }

        MenuCategory::create($data);

        return redirect()->route('admin.menuCategory.index')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory , $id)
    {
        $category = MenuCategory::findOrFail($id);
        return view('admin.menuCategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuCategory $menuCategory, $id)
    {
        $category = MenuCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:menu_categories,name,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path('uploads/menuCategory/' . $category->image))) {
                unlink(public_path('uploads/menuCategory/' . $category->image));
            }

            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menuCategory'), $filename);
            $data['image'] = $filename;
        }

        $category->update($data);

        return redirect()->route('admin.menuCategory.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory, $id)
    {
        $category = MenuCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.menuCategory.index')->with('success', 'Category deleted successfully!');
    }
}
