<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description']; // Allow mass assignment for these fields

    /**
     * Define the one-to-many relationship with the Product model.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
