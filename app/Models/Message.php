<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    // Allow mass assignment for these attributes
    protected $fillable = ['name', 'email', 'message'];
}
