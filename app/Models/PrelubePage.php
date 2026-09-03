<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class PrelubePage extends Model
{
    use IsSingleton;

    protected $table = 'prelube_page';

    protected $fillable = [
        'caption', 'hero_image', 'benefit_1_icon', 'benefit_1_text', 'benefit_2_icon', 'benefit_2_text',
        'gallery_image_1', 'gallery_image_2', 'meta_title', 'meta_description',
    ];
}
