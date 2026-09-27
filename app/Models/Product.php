<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'name',
    'slug',
    'description',
    'price',
    'stock',
    'image',
    'is_active',
    'is_slider',
];

    protected $casts = [
    'price' => 'decimal:2',
    'is_active' => 'boolean',
    'is_slider' => 'boolean',
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * URL gambar produk.
     *
     * Gambar hasil upload lewat form admin disimpan di storage/app/public/products,
     * sedangkan gambar demo bawaan seeder ada langsung di public/images.
     * Accessor ini menyesuaikan otomatis supaya keduanya tetap tampil benar.
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/product-img-1.jpg');
        }

        if (str_starts_with($this->image, 'products/')) {
            return asset('storage/' . $this->image);
        }

        return asset('images/' . $this->image);
    }
}