<?php
namespace App\Core\Collection;

use App\Models\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CollectionRepository implements CollectionInterface {
    public function getAllCollections() {
        return DB::table("collections")->get();
    }
    
    public function createCollections( array $data ) {
        // if(!empty($data['image'])){
        //     $data["image"] = $this->imageUpload($data["image"]);
        // }
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('collections')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        $data["created_at"] = date("Y-m-d");
        return DB::table("collections")->insert($data);
    }

    public function getCollection($slug) {
        return DB::table("collections")->where("slug", $slug)->first();
    }

    public function updateCollection(array $data, $slug) {
        
        // if(!empty($data['image'])){
        //     File::delete("storage/CollectionImage/" . $this->getCollection($slug)->image);
        //     $data["image"] = $this->imageUpload($data["image"]);
        // }else {
        //     unset($data["image"]);
        // }
        return Collection::where("slug", $slug)->update($data);
    }

    public function deleteCollection($slug) {
        return Collection::where("slug", $slug)->delete();
    }

    // public function imageUpload($image){
    //     $content_db = time() . rand(0000, 9999) . "." . $image->getClientOriginalExtension();
    //     $image->storeAs("public/CollectionImage", $content_db);
    //     return $content_db;
    // }

    public function collectionsChangeS($slug) {
        if($this->getCollection($slug)->status == 1){
           
            return Collection::where("slug", $slug)->update(["status" => 0]);
        }else{
            
            return Collection::where("slug", $slug)->update(["status" => 1]);
        }
    }
}