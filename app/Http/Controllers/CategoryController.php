<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->category;
        return response()->json($categories);
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json(['message' => 'Categoría creada exitosamente', 'category' => $category]);
    }

    public function show(Category $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->save();

        return response()->json(['message' => 'Categoría actualizada', 'category' => $category]);
    }

    public function destroy(Category $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente']);
    }
}
