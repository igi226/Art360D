<?php

namespace App\Http\Controllers\Admin\Collections;

use App\Core\Collection\CollectionInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $collections;
    public function __construct( CollectionInterface $collections) {
        $this->collections = $collections; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["collections"] = $this->collections->getAllCollections();
        return view("Admin.Collections.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Collections.create");
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
            "name" => "required|string",
            // "image" => "required|mimes:jpeg,png,jpg,gif",
        ]);
        $data = $request->except("_token");
        if($this->collections->createCollections($data)) {
            return redirect()->route("collections.index")->with("msg", "Collection inserted successfully");
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
    public function edit($slug)
    {
        $data["collection"] = $this->collections->getCollection($slug);
        return view("Admin.Collections.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            "name" => "required|string",
            // "image" => "mimes:jpeg,png,jpg,gif",
        ]);
        $data = $request->except("_token", "_method");
        if($this->collections->updateCollection($data, $slug)) {
            return redirect()->route("collections.index")->with("msg", "Collection updated successfully");
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
    public function destroy($slug)
    {
       if($this->collections->deleteCollection($slug)){
            return back()->with("msg", "Collection has been deleted successfully");
       }else{
            return back()->with("msg", "Some errror occur!");
       }
    }

    public function collectionsChangeS( Request $request ) {
       if($this->collections->collectionsChangeS($request->slug)){
        return response()->json([
            "status" => 1,
            "msg"=> "Status updated successfully."
        ]);
       }else{
        return response()->json([
            "status" => 0,
            "msg" => "Some error occur!"
        ]);
       }
    }
}
