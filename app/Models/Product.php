<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',  // Menambahkan category_id sebagai kolom yang dapat diisi
    ];

    // Relasi many-to-one: Banyak produk bisa tergabung dalam satu kategori
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');  // Menghubungkan produk dengan kategori melalui 'category_id'
    }
}
