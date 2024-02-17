<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','prodname','file'];
    protected $table = 'products';

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
