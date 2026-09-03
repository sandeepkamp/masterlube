<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class AdvantagesPage extends Model
{
    use IsSingleton;

    protected $table = 'advantages_page';

    protected $fillable = [
        'banner_eyebrow', 'banner_title', 'intro_body',
        'feature_grid', 'features_heading',
        'testimonials_eyebrow', 'testimonials_title',
        'meta_title', 'meta_description',
    ];

    protected function casts(): array
    {
        return ['feature_grid' => 'array'];
    }
}
