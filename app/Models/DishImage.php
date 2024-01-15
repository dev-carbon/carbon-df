<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DishImage extends Model
{
    use HasFactory;

    protected $fillables = [
        'dish_id',
        'image_path',
    ];

    public function dish(): BelongsTo {
        return $this->belongsTo(Dish::class);
    }
}
