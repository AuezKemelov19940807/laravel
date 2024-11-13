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
        'link'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    protected static function boot() {
        parent::boot();


        static::creating(function ($catalog) {
            $catalog->slug = Str::slug($catalog->name);
            $catalog->link = Str::slug($catalog->slug);
        });


        static::updating(function ($catalog) {
            $catalog->slug = Str::slug($catalog->name);
            $catalog->link = Str::slug($catalog->slug);
        });

    }


    public function categories():HasMany
    {
        return  $this->hasMany(Category::class);
//        return $this->belongsToMany(Category::class);
    }

}
