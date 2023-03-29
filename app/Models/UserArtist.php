<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArtist extends Model
{
    use HasFactory;

    public function type_artist(){
        return $this->belongsTo(ArtistType::class, 'artist_type', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
