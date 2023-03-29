<?php
namespace App\Core\Artists;

use App\Models\ArtistType;
use App\Models\Subscription;
use App\Models\SubscriptionTaken;
use App\Models\User;
use App\Models\UserArtist;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;
class ArtistRepository implements ArtistInterface {

    public function getAllArtists(){
        return User::get();
    }

    public function storeArtist($data, $data2, $subscriptions_id){
        $slug = Str::slug($data['first_name']);
        $slug_count = DB::table('users')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = $slug.'-'.sha1($slug);
        }
        $data['slug'] = $slug;
        $storeartist = User::create($data);
        
        $data2["user_id"] = $storeartist->id;
        DB::table("user_artists")->insert($data2);

        $plan_end_date = $this->endDate($subscriptions_id);
        return DB::table("subscription_takens")->insert([
            "subscription_id" => $subscriptions_id,
            "artist_id" => $storeartist->id,
            "end_date" => $plan_end_date,
        ]);

    }
    public function updateArtist(array $data, $data2, $subscriptions_id, $id) {
      if(isset($data["image"])){
        $content_db = time() . rand(0000, 9999) . "." . $data["image"]->getClientOriginalExtension();
        $data["image"]->storeAs("public/UserImage", $content_db);
        $data["image"] = $content_db;
        }
       
        DB::table("user_artists")->where("user_id", $id)->update($data2);
        $plan_end_date = $this->endDate($subscriptions_id);
        $subscriptionTaken = SubscriptionTaken::where('artist_id', $id)->first();
        if($subscriptions_id != $subscriptionTaken->subscription_id){
            $subscriptionTaken->delete();
            SubscriptionTaken::create([
                "subscription_id" => $subscriptions_id,
                "artist_id" => $id,
                "end_date" => $plan_end_date,
            ]);
        }
        

        return User::where("id", $id)->update($data);
          
    }

    public function endDate($subscriptions_id){
        $plan = Subscription::find($subscriptions_id);
        if($plan->duration == "Per Month"){
            return $plan_end_date = Carbon::now()->addDays(30); 
        }elseif($plan->duration == "Per Year"){
            return $plan_end_date = Carbon::now()->addDays(365); 
        }
    }
    

    public function deleteArtist($id) {
        $artist = User::findOrFail($id);
        foreach($artist->subscription_taken as $taken_plan) {
            $taken_plan->delete();
        }
        $artist->user_artist->delete();
        return $artist->delete();
    }

    public function getSpecificArtist($id){
        return User::with('total_artworks')->findOrFail($id);
    }

    public function storeArtistType($data){
        return DB::table("artist_types")->insert($data);
    }
    public function updateArtistType($data, $id){
        return ArtistType::where("id", $id)->update($data);
    }

    public function getSpecificArtistType($id){
        return DB::table("artist_types")->where("id",$id)->first();

    }
    
    public function getAllArtistsTypes(){
        return DB::table("artist_types");
    }

    public function deleteArtistTypes($id){
        return ArtistType::findOrFail($id)->delete();
        
    }

    public function followUnfollow($artist_id) {
        $data = DB::table('artist_follows');
        $check = $data->where('artist_id', $artist_id)->where('user_id', auth()->id())->first();
        if($check){
             $data->delete();
             return 'Follow';
        }else{
             $data->insert([
                'artist_id' => $artist_id,
                'user_id' => auth()->id(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return 'Following';
        }
    }

    public function getFeaturedArtist(){
        return UserArtist::where('fearured_artist', 1)->with('user')->get();
    }

    public function getCategoryArtist($artist_type_id){
        return UserArtist::where('artist_type', $artist_type_id)->with('user')->get();
    }


    
}

