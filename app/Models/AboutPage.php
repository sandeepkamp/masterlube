<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use IsSingleton;

    protected $table = 'about_page';

    protected $fillable = ['story_body', 'drives_us_grid', 'meta_title', 'meta_description'];

    protected function casts(): array
    {
        return ['drives_us_grid' => 'array'];
    }
}
