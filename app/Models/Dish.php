<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'slug'
    ];

    public function slug() {
        return Str::slug($this->name);
    }

    public function images(): HasMany {
        return $this->hasMany(DishImage::class);
    }

    public function restaurant(): BelongsTo {
        return $this->belongsTo(Restaurant::class);
    }

    public function ratings(): HasMany {
        return $this->hasMany(DishRating::class);
    }
}
