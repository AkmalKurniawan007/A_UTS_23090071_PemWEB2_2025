<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index(Request $request)
    {
        $q = $request->q;

$products = Product::query()
    ->where('name', 'like', '%' . $q . '%')
    ->paginate(10);

    return view('dashboard.products.index', compact('products', 'q'));


    }

    // Menampilkan form untuk menambah produk
    public function create()
    {
        return view('dashboard.products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('successMessage', 'Product created successfully.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    // Mengupdate produk
    public function update(Request $request, Product $product)
    {
        // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|max:2048', // Memastikan file gambar valid
    ]);

    // Update field biasa
    $product->name = $validated['name'];
    $product->description = $validated['description'];
    $product->price = $validated['price'];
    $product->stock = $validated['stock'];

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        // Simpan gambar baru di folder 'products' di storage/public
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;  // Update path gambar pada model
    }

    // Simpan perubahan produk
    $product->save();

    // Redirect ke halaman produk dengan pesan sukses
    return redirect()->route('products.index')->with('successMessage', 'Product updated successfully');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('successMessage', 'Product deleted successfully');
    }
}
