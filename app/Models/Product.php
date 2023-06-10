<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'brand',
        'price',
        'price_sale',
        'category_id',
        'stock',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
        'brand' => 'string',
        'price' => 'float',
        'price_sale' => 'float',
        'category_id' => 'integer',
        'stock' => 'integer',
    ];

    public static $rules = [
        'name' => 'required|string|max:50',
        'description' => 'nullable|string|max:50',
        'image' => 'required|string',
        'brand' => 'required|string',
        'price' => 'required|float',
        'price_sale' => 'nullable|float',
        'category_id' => 'required|integer',
        'stock' => 'required|integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
