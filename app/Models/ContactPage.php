<?php

namespace App\Models;

use App\Models\Concerns\IsSingleton;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use IsSingleton;

    protected $table = 'contact_page';

    protected $fillable = [
        'shipping_address', 'ordering_phone', 'ordering_email', 'tech_phone', 'tech_email',
        'dealer_phone', 'dealer_email', 'intro_text', 'meta_title', 'meta_description',
    ];
}
