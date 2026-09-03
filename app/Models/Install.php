<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Install extends Model
{
    protected $fillable = ['title', 'caption', 'order', 'status'];

    public function photos(): HasMany
    {
        return $this->hasMany(InstallPhoto::class)->orderBy('order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
