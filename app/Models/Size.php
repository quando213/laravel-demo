<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'sort_number',
        'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(Size::class, 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
