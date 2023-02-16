<?php
namespace App\Core\Subscriptions;

use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubscriptionRepository implements SubscriptionInterface {
    public function storeSubscription(array $common_data, $feature_data){
        $slug = Str::slug($common_data['plan_name']);
        $slug_count = DB::table('subscriptions')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $common_data['slug'] = $slug;
        $subscription_plan = Subscription::create($common_data);
        $feature_data["subscription_id"] = $subscription_plan->id;
        return DB::table("artist_subscription_plan_features")->insert($feature_data);

    }

}