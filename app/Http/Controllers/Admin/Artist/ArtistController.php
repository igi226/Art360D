<?php

namespace App\Http\Controllers\Admin\Artist;

use App\Core\Artists\ArtistInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArtistController extends Controller
{
    private $artist;

    public function __construct( ArtistInterface $artist)
    {
        $this->artist = $artist;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["artists"] = $this->artist->getAllArtists();
        return view("Admin.Artists.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["subscription_plans"] = Subscription::where("user_type", "artist")->get();
        $data["artist_types"] = $this->artist->getAllArtistsTypes()->get();
        return view("Admin.Artists.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        // dd("ff");
        $data = $request->except("_token", "", "artist_type", "feature_artist", "password", "subscription_id","condition_report", "history_and_Provenance", "shipping_information", "payment_and_return_policies");
        $data["user_type"] = "artist";
        $data["password"] = Hash::make($request->password);
        $data2 = $request->only("artist_type", "feature_artist","condition_report", "history_and_Provenance", "shipping_information", "payment_and_return_policies");
        $subscriptions_id = $request->subscription_id;
        if($this->artist->storeArtist($data, $data2, $subscriptions_id)) {
            return redirect()->route("artists.index")->with("msg", "Artist added successfully.");
        }else{
            return back()->with("msg", "Some error occur!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["specific_artist"] = $this->artist->getSpecificArtist($id);
        return view("Admin.Artists.view", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['artist'] = $this->artist->getSpecificArtist($id);
        $data["subscription_plans"] = Subscription::where("user_type", "artist")->get();
        $data["artist_types"] = $this->artist->getAllArtistsTypes()->get();
        return view("Admin.Artists.edit", $data);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, $id)
    {
        $data = $request->except("_token",  "_method", "artist_type", "feature_artist", "password", "confirm_password", "subscription_id","condition_report", "history_and_Provenance", "shipping_information", "payment_and_return_policies");
        if(!empty($request->password)){
            $data["password"] = Hash::make($request->password);
        }
       
        $data2 = $request->only("artist_type", "feature_artist","condition_report", "history_and_Provenance", "shipping_information", "payment_and_return_policies");
        $subscriptions_id = $request->subscription_id;
        if($this->artist->updateArtist($data, $data2, $subscriptions_id, $id)){
            return redirect()->route("artists.index")->with("msg", "Profile updated successfully");
        }else{
            return back()->with("msg", "Somev error occur!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if($this->artist->deleteArtist($id)){
            return back()->with("msg", "Artist deleted successfully");
       }else{
            return back()->with("msg", "Some error occur!");
       }
    }
}
