<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'unit_id',
        'category_id',
        'name',
        'quantity',
        'status',
        'product_image',
        'created_by',
        'updated_by',
    ];

    public function supplier(){
        return $this->belongsTo('\App\Models\Supplier', 'supplier_id');
    }

    public function unit(){
        return $this->belongsTo('\App\Models\Unit', 'unit_id');
    }

    public function category(){
        return $this->belongsTo('\App\Models\Category', 'category_id');
    }
}
