<?php

namespace App\Models;

use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'category_id',
        'status',
        'thumbnail',
        'images'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function toArray()
    {
        $result = parent::toArray();
        $result['price_pretty'] = number_format($this->price, 0, '.', ',');
        $result['status_title'] = CommonStatus::getDescription($this->status);
        if ($this->thumbnail) {
            $result['thumbnail_url'] = url('images/upload/'.$this->thumbnail);
        }
        if ($this->images) {
            $images = explode(',', $this->images);
            $images_url = [];
            foreach ($images as $image) {
                $image_url = url('images/upload/'.$image);
                array_push($images_url, $image_url);
            }
            $result['images_url'] = $images_url;
        }
        return $result;
    }
}
