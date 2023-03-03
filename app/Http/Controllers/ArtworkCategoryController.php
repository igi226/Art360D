<?php

namespace App\Http\Controllers;

use App\Core\Category\CategoryInterface;
use Illuminate\Http\Request;

class ArtworkCategoryController extends Controller
{
    private $category;

    public function __construct( CategoryInterface $categoryInterface){
        $this->category = $categoryInterface;
    }
    
    public function index()
    {
        $data['categories'] = $this->category->getAllCategory();
        return view('Admin.Category.index', $data);
    }

    public function create()
    {
        return view('Admin.Category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);
        $data = $request->only("name", "image");
        if($this->category->storeCategory($data)){
            return redirect()->route("artwork-category.index")->with("msg", "Category inserted successfully.");
        }else{
            return back()->with("msg", "some error occur!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $data['category'] = $this->category->getCategory($slug);
        return view('Admin.Category.edit', $data);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            "name" => "required|string"
        ]);
        $data = $request->only("name", "image");
        if($this->category->updateCategory($data, $slug)){
            return redirect()->route("artwork-category.index")->with("msg", "Category updated successfully.");
        }else{
            return back()->with("msg", "some error occur!");
        }
    }

    public function destroy($slug)
    {
        if($this->category->deleteCategory($slug)){
            return back()->with("msg", "Category has been deleted successfully");
        }else{
            return back()->with("msg", "Some errror occur!");
        }
        
    }
}
