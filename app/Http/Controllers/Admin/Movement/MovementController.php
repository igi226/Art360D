<?php

namespace App\Http\Controllers\Admin\Movement;

use App\Core\Movements\MovementInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    private $movements;
    public function __construct( MovementInterface $movementInterface) {
        $this->movements = $movementInterface;
    }
    public function index()
    {
        $data['movements'] = $this->movements->getAllMovements();
        return view('Admin.Movements.index', $data);
    }

    

    public function create()
    {
        return view('Admin.Movements.create');
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
        if($this->movements->storeMovement($data)){
            return redirect()->route("movements.index")->with("msg", "Material inserted successfully.");
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
        $data['movement'] = $this->movements->getMovement($slug);
        return view('Admin.Movements.edit', $data);
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
        // dd($this->movements->updateMovement($data, $slug));
        if($this->movements->updateMovement($data, $slug)){
            return redirect()->route("movements.index")->with("msg", "Movement updated successfully.");
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
        if($this->movements->deleteMovement($slug)){
            return back()->with("msg", "Movement has been deleted successfully");
        }else{
            return back()->with("msg", "Some errror occur!");
        }
        
    }
}
