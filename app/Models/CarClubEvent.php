<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarClubEvent extends Model
{
    protected $fillable = ['title', 'cover_image', 'description', 'order', 'status'];

    public function photos(): HasMany
    {
        return $this->hasMany(CarClubEventPhoto::class)->orderBy('order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
