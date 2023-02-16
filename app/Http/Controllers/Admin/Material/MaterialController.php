<?php

namespace App\Http\Controllers\Admin\Material;

use App\Core\Material\MaterialInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    private $materials;

    public function __construct( MaterialInterface $materialInterface){
        $this->materials = $materialInterface;
    }
    public function index()
    {
        $data["materials"] = $this->materials->getAllMaterials();
        return view("Admin.Materials.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Materials.create");
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
            "name" => "required|string"
        ]);
        $data = $request->only("name");
        //  dd($data);
        if($this->materials->storeMaterial($data)){
            return redirect()->route("materials.index")->with("msg", "Material inserted successfully.");
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
        $data["material"] = $this->materials->getMaterial($slug);
        return view("Admin.Materials.edit", $data);
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
            "name" => "required|string"
        ]);
        $data = $request->only("name");
        if($this->materials->updateMaterial($data, $slug)){
            return redirect()->route("materials.index")->with("msg", "Material updated successfully.");
        }else{
            return back()->with("msg", "some error occur!");
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
        if($this->materials->deleteMaterial($slug)){
            return back()->with("msg", "Material has been deleted successfully");
        }else{
            return back()->with("msg", "Some errror occur!");
        }
    }
}
