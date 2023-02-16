<?php

namespace App\Http\Controllers\Admin\Style;

use App\Core\Style\StyleInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    private $styles;
    public function __construct( StyleInterface $styleInterface){
        $this->styles = $styleInterface;
    }
    public function index()
    {
        $data["styles"] = $this->styles->getAllStyles();
        return view("Admin.Style.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Style.create");
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
        $data = $request->except("_token");
        if($this->styles->createStyle($data)){
            return redirect()->route("styles.index")->with("msg", $data["name"] . " inserted successfully");
        }else{
            return back()->with("msg", "Some error occur");
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
        $data["style"] = $this->styles->getStyle($slug);
        return view("Admin.Style.edit", $data);
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
        ]);
        $data = $request->except("_token", "_method");
        if($this->styles->updateStyle($data, $slug)) {
            return redirect()->route("styles.index")->with("msg", "Style updated successfully");
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
       if($this->styles->deleteStyle($slug)){
            return back()->with("msg", "The style has been deleted successfully");
       }else{
            return back()->with("msg", "Some error occur!");
       }
    }
}
