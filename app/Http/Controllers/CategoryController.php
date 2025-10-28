<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['name' => 'required', 'name' => 'unique:categories,name'],
            [
                'name.required' => __('Name is required'),
                'name.unique' => __('Category with name ":input" already exists!'),
            ]
        );

        $validated['user_id'] = Auth::id(); // Assuming user is authenticated

        Category::create($validated + ['user_id' => Auth::id()]);

        return redirect()->route('categories.index')->with('success', __('Successfully created category') . '!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Edit action to retrieve the category by ID
        $category = Category::findOrFail($id);

        // Ensure the category belongs to the authenticated user
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index');
        }

        return view(
            'categories.edit',
            ['category' => $category]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update action to validate and update the category
        $validated = $request->validate(
            ['name' => 'required'],
            [
                'name.required' => __('Name is required'),
            ]
        );

        $category = Category::findOrFail($id);

        // Ensure the category belongs to the authenticated user
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index');
        }

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', __('Successfully updated category') . '!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        // Ensure the category belongs to the authenticated user
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', __('Successfully deleted category') . '!');
    }
}
