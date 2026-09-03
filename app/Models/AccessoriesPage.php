<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class AccessoriesPage extends Model
{
    use IsSingleton;

    protected $table = 'accessories_page';

    protected $fillable = ['banner_eyebrow', 'banner_title', 'banner_text', 'meta_title', 'meta_description'];
}
