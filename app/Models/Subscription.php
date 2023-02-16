<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "plan_name", "plan_price", "duration", "user_type", "slug"
    ];

    public function artist_plan_features(){
        return $this->hasMany(ArtistSubscriptionPlanFeature::class, 'subscription_id', 'id');
    }
}
