<?php

namespace App\Http\Controllers\Admin;

use App\Core\ArtworkSubject\ArtworkSubjectInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtworkSubjectController extends Controller
{
    private $artwork_subjects;

    public function __construct( ArtworkSubjectInterface $artworkSubjectInterface){
        $this->artwork_subjects = $artworkSubjectInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['artwork_subjects'] = $this->artwork_subjects->getAllSubjects();
        return view("Admin.ArtworkSubject.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.ArtworkSubject.create");
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
            "name" =>"required|string"
        ]);
        $data = $request->except("_token");
        if($this->artwork_subjects->storeArtworkSubject($data)){
            return redirect()->route("artworks-subjects.index")->with("mag", "Subject Added successfully.");
        }else{
            return back()->with("msg", "some error occur!");
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
        $data['subject'] = $this->artwork_subjects->getSubject($slug);
        return view("Admin.ArtworkSubject.edit", $data);


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
            "name" =>"required|string"
        ]);
        if( $this->artwork_subjects->updateSubject($data = $request->only("name"), $slug)) {
            return redirect()->route("artworks-subjects.index")->with("msg", "Subject updated successfully.");
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
       if($this->artwork_subjects->deleteSubject($slug)){
        return back()->with("msg", "Subject has been deleted successfully");
    }else{
         return back()->with("msg", "Some errror occur!");
    }
    }
}
