<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'source', 'first_name', 'last_name', 'company', 'email', 'phone',
        'address', 'city', 'state', 'zip', 'country', 'equipment_type',
        'application_types', 'hear_about_us', 'hear_about_other', 'message',
        'status', 'admin_notes', 'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'application_types' => 'array',
            'hear_about_us' => 'array',
        ];
    }
}
