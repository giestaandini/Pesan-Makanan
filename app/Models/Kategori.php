<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['idkategori','kategori'];
    protected $table = 'kategori';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'idkategori');
    }
}
