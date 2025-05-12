<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\homepagecategoris;
use App\Models\Categories;

class homepage extends Controller
{
    //fungsi untuk menampilkan halaman homepage
    public function index()
    {
        $title = "HomePage";
        $categories = Categories::all();

        return view('web.homepage',[
            'title' => $title,
            'categories' => $categories,
        ]);
    }


    public function product()
    {
        $title = "Products";
        $products = [

        ];
        return view('web.products', compact('title', 'products'));
    }

    public function showproduct($slug)
    {
        $title = "Single Product";
        return view('web.single_product', compact('title', 'slug'));
    }

    public function category()
    {
        $title = "Category";
        $categories = Categories::all();

        
        return view('web.categories',[
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function showcategory($slug)
    {
        $title = "Single Categories";
        {
            $category = Category::where('slug', $slug)->firstOrFail();
    
            // ambil semua product yang kategori_id nya sesuai
            $products = Product::where('category_id', $category->id)->get();
    
            return view('category.show', [
                'title' => $category->name,
                'category' => $category,
                'products' => $products
            ]);
        }
        return view('web.single_categories', compact('title', 'slug'));
    }

    public function cart()
    {
        return view('web.cart', compact('title'));
    }
   
    public function checkout()
    {
        return view('web.checkout', compact('title'));
    }
}


