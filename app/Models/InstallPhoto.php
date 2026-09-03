<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstallPhoto extends Model
{
    protected $fillable = ['install_id', 'image', 'caption', 'is_featured', 'order'];

    protected function casts(): array
    {
        return ['is_featured' => 'boolean'];
    }
}
