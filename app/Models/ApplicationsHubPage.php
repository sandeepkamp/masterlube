<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class ApplicationsHubPage extends Model
{
    use IsSingleton;

    protected $table = 'applications_hub_page';

    protected $fillable = ['banner_eyebrow', 'banner_title', 'banner_text', 'intro_title', 'intro_body', 'meta_title', 'meta_description'];
}
