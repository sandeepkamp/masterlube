<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class CustomHosePage extends Model
{
    use IsSingleton;

    protected $table = 'custom_hose_page';

    protected $fillable = ['banner_eyebrow', 'banner_title', 'banner_text', 'other_stuff_heading', 'meta_title', 'meta_description'];
}
