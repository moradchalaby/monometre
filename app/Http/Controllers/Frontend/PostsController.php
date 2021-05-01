<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $blogs = Blogs::query()->where('blog_status', 1)
            ->where('blog_title', 'LIKE', "%{$search}%")
            ->orWhere('blog_content', 'LIKE', "%{$search}%")
            ->get();
        $products = Products::query()->where('product_status', 1)
            ->where('product_title', 'LIKE', "%{$search}%")
            ->orWhere('product_content', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('frontend.search', compact('blogs', 'products'));
    }
}
