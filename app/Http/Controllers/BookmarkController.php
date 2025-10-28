<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the query string parameter 'category_ids' if present
        // $categoryIds = request()->query('category_ids');

        // if ($categoryIds) {
        //     $categoryIds = explode('_', $categoryIds);
        // }

        $categoryId = request()->query('category_id');

        // Retrieve bookmarks (websites) with their associated categories for the authenticated user.
        // If a category_id is provided, filter bookmarks by that category.
        if ($categoryId) {
            $bookmarks = Website::where('user_id', Auth::id())->with('categories')->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get();
        } else {
            $bookmarks = Website::where('user_id', Auth::id())->with('categories')->get();
        }

        $categories = Category::where('user_id', Auth::id())->get();

        return view('bookmarks.index', [
            'bookmarks' => $bookmarks,
            'categories' => $categories,
            'categoryId' => $categoryId ?? null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('bookmarks.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['title' => 'required', 'url' => 'required'],
            [
                'title.required' => __('Title is required'),
                'url.required' => __('Website URL is required')
            ]
        );

        $validated['user_id'] = Auth::id(); // Assuming user is authenticated
        $category_id = $request->input('category_id'); // Get category ID from the request

        $website = Website::create($validated);

        if ($category_id) {
            $website->categories()->attach($category_id);
        }

        return redirect()->route('bookmarks.index')->with('success', __('Bookmark added successfully!'));
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
        // Edit action to retrieve the bookmark by ID
        $bookmark = Website::findOrFail($id);

        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id !== Auth::id()) {
            return redirect()->route('bookmarks.index');
        }

        $categories = Category::where('user_id', Auth::id())->get();

        return view(
            'bookmarks.edit',
            ['bookmark' => $bookmark, 'categories' => $categories]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update action to validate and update the bookmark
        $validated = $request->validate(
            ['title' => 'required', 'url' => 'required'],
            [
                'title.required' => __('Title is required'),
                'url.required' => __('Website URL is required')
            ]
        );

        $bookmark = Website::findOrFail($id);

        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id !== Auth::id()) {
            return redirect()->route('bookmarks.index');
        }

        $category_id = $request->input('category_id'); // Get category ID from the request

        $bookmark->update($validated);

        if ($category_id) {
            $bookmark->categories()->attach($category_id);
        }

        return redirect()->route('bookmarks.index')->with('success', __('Bookmark updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookmark = Website::find($id);

        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id !== Auth::id()) {
            return redirect()->route('bookmarks.index');
        }

        $bookmark->delete();

        return redirect()->route('bookmarks.index')->with('success', __('Bookmark deleted successfully!'));
    }

    public function filterByCategory(Request $request)
    {
        $categoryIds = $request->input('category_id');
        if ($categoryIds) {
            // Ensure $categoryIds is an array
            if (!is_array($categoryIds)) {
                $categoryIds = [$categoryIds];
            }
        } else {
            $categoryIds = [];
        }
        $categoryIds = implode('_', $categoryIds);
        return redirect()->route('bookmarks.index', ['category_ids' => $categoryIds]);

        // if ($categoryIds) {
        //     $bookmarks = Website::where('user_id', Auth::id())
        //         ->whereHas('categories', function ($query) use ($categoryId) {
        //             $query->where('category_id', $categoryId);
        //         })
        //         ->with('categories')
        //         ->get();
        // } else {
        //     $bookmarks = Website::where('user_id', Auth::id())->with('categories')->get();
        // }

        // $categories = Category::where('user_id', Auth::id())->get();

        // return view('bookmarks.index', ['bookmarks' => $bookmarks, 'categories' => $categories]);
    }
}
