<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MagazinePage extends Model
{
    protected $fillable = ['magazine_id', 'image', 'order'];

    public function magazine(): BelongsTo
    {
        return $this->belongsTo(Magazine::class);
    }
}
