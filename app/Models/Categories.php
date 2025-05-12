<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'product_categories';  

    // Relasi one-to-many: Satu kategori dapat memiliki banyak produk
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');  // Asumsi bahwa kolom 'category_id' ada di tabel 'products'
    }
    public function Categories()
{
    return $this->belongsTo(Categories::class);
}
}
