<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTaken extends Model
{
    use HasFactory;
    protected $fillable = [
        "end_date",  "subscription_id", "artist_id", 
    ];

    public function subscription_plan(){
        return $this->belongsTo(Subscription::class, 'subscription_id','id');
    }
    
}
