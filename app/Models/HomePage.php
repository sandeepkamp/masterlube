<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use IsSingleton;

    protected $table = 'home_page';

    protected $fillable = [
        'hero_eyebrow', 'hero_title', 'hero_text', 'hero_image',
        'feature_grid', 'features_title',
        'systems_grid', 'systems_eyebrow', 'systems_title', 'systems_text',
        'applications_eyebrow', 'applications_title', 'applications_grid',
        'why_choose_eyebrow', 'why_choose_title', 'why_choose_body', 'why_choose_grid',
        'news_eyebrow', 'news_title', 'news_cta_title', 'news_cta_text',
        'faq_eyebrow', 'faq_title',
        'car_clubs_eyebrow', 'car_clubs_title', 'car_clubs_text', 'car_clubs_image',
        'contact_heading', 'contact_text',
        'testimonials_eyebrow', 'testimonials_title',
        'meta_title', 'meta_description',
    ];

    protected function casts(): array
    {
        return ['feature_grid' => 'array', 'systems_grid' => 'array', 'why_choose_grid' => 'array', 'applications_grid' => 'array'];
    }
}
