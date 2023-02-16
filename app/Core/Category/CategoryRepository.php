<?php
namespace App\Core\Category;

use App\Models\ArtworkCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryRepository implements CategoryInterface {
    public function getAllCategory(){
        return ArtworkCategory::get();
    }
    public function getCategory($slug){
        return ArtworkCategory::where("slug", $slug)->firstOrFail();
    }
    public function storeCategory(array $data){
        $data["created_at"] = date("Y-m-d");
        // dd($data);
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('artwork_categories')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        return DB::table("artwork_categories")->insert($data);
    }
    public function updateCategory(array $data, $slug){
        $data["updated_at"] = date("Y-m-d");
        return ArtworkCategory::where("slug", $slug)->update($data);
    }
    public function deleteCategory($slug){
        return ArtworkCategory::where("slug", $slug)->firstOrFail()->delete();
    }
}

