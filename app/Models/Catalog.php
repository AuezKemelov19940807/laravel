<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Catalog extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];


    protected static function boot() {
        parent::boot();


        static::creating(function ($catalog) {
            $catalog->slug = Str::slug($catalog->name);
        });


        static::updating(function ($catalog) {
            $catalog->slug = Str::slug($catalog->name);
        });

    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'catalog_category');
    }

}
