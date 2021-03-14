<?php

namespace App\Models;

use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'sort_number',
        'parent_id',
        'size_id',
        'status',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function toArray()
    {
        $result = parent::toArray();
        $result['status_title'] = CommonStatus::getDescription($this->status);
        if ($this->icon) {
            $result['icon_url'] = url('images/upload/'.$this->icon);
        }
        if ($this->relationLoaded('children') && !count($this->children)) {
            $result['children'] = null;
        }
        return $result;
    }
}
