<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality',
        'phone',
        'street',
        'postal_code',
        'city',
        'description',
        'slug'
    ];

    public function address() {
        return $this->street . ', ' . $this->postal_code . ' ' . $this->city;
    }

    public function slug() {
        return Str::slug($this->name);
    }

    public function images(): HasMany {
        return $this->hasMany(RestaurantImage::class);
    }

    public function dishes(): HasMany {
        return $this->hasMany(Dish::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
