<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarClubEventPhoto extends Model
{
    protected $fillable = ['car_club_event_id', 'image', 'order'];
}
