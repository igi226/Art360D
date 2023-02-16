<?php
namespace App\Core\Subscriptions;

interface SubscriptionInterface {

    public function storeSubscription(array $common_data, $feature_data);
   
}
