<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class SystemsPage extends Model
{
    use IsSingleton;

    protected $table = 'systems_page';

    protected $fillable = ['title', 'image', 'description', 'includes_list', 'options_list', 'kits', 'meta_title', 'meta_description'];

    protected function casts(): array
    {
        return ['includes_list' => 'array', 'options_list' => 'array', 'kits' => 'array'];
    }
}
