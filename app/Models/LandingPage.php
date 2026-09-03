<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use IsSingleton;

    protected $table = 'landing_page';

    protected $fillable = [
        'hero_title', 'hero_text', 'hero_bullets', 'hero_cta_primary_text', 'hero_cta_secondary_text',
        'stat_1_number', 'stat_1_label', 'stat_1_caption',
        'stat_2_number', 'stat_2_label', 'stat_2_caption',
        'showcase_title', 'showcase_tagline', 'showcase_grid', 'showcase_cta_text',
        'solutions_eyebrow', 'solutions_title', 'solutions_subtitle', 'solutions_grid',
        'testimonials_eyebrow', 'testimonials_title', 'trust_label', 'trust_pills',
        'cta_eyebrow', 'cta_title', 'cta_text', 'cta_primary_text', 'cta_secondary_text',
        'footer_text', 'footer_badges', 'copyright_text',
        'meta_title', 'meta_description',
    ];

    protected function casts(): array
    {
        return ['showcase_grid' => 'array', 'solutions_grid' => 'array', 'footer_badges' => 'array', 'trust_pills' => 'array', 'hero_bullets' => 'array'];
    }
}
