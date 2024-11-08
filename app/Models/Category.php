<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text',
        'top_description',
        'bottom_description',
        'budget',
        'image'
    ];

    protected static function boot() {
        parent::boot();


        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });


        static::updating(function ($category) {
            $category->slug = Str::slug($category->title);
        });

    }


    public function catalog():BelongsTo
    {
        return  $this->belongsTo(Catalog::class, 'slug');
//        return $this->belongsToMany(Catalog::class, 'catalog_category');
    }
}
