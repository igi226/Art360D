<?php

namespace App\Http\Controllers;

use App\Core\Artists\ArtistInterface;
use Illuminate\Http\Request;

class ArtistTypeController extends Controller
{
    private $artist_type;
    public function __construct( ArtistInterface $artist_type) {
        $this->artist_type = $artist_type;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["artisttypes"] = $this->artist_type->getAllArtistsTypes()->paginate(5);
        return view("Admin.Artists.indexArtistType", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Artists.createArtistType");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "artist_type" => "required",
        ]);
       
        if( $this->artist_type->storeArtistType($data = $request->only("artist_type"))) {
            return redirect()->route("artisttypes.index")->with("msg", "Artist type added successfully.");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['artisttype'] = $this->artist_type->getSpecificArtistType($id);
        return view("Admin.Artists.editArtistType", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "artist_type" => "required",
        ]);
       
        if( $this->artist_type->updateArtistType($data = $request->only("artist_type"), $id)) {
            return redirect()->route("artisttypes.index")->with("msg", "Artist type updated successfully.");
        }else{
            return back()->with("msg", "Some error occur!");
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
        if($this->artist_type->deleteArtistTypes($id)){
            return back()->with("msg", "Artist type deleted successfully");
       }else{
            return back()->with("msg", "Some error occur!");
       }
        
    }
}
