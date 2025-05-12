<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan data dinamis.
     */
    public function index(Request $request)
    {
        // Cek user login
        $user = Auth::user();

        // Ambil parameter pencarian dari URL (jika ada)
        $search = $request->input('search');

        // Query produk, filter jika ada pencarian
        $products = Product::when($search, function ($query, $search) {
                            return $query->where('name', 'like', "%{$search}%");
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10); // pagination

        // Ambil statistik sederhana
        $totalProducts = Product::count();
        $totalUsers = User::count();

        // Kirim data ke view
        return view('home', [
            'user' => $user,
            'products' => $products,
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'search' => $search
        ]);
}
}
