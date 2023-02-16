<?php
namespace App\Core\Style;
use Illuminate\Support\Str;
use App\Models\Style;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StyleRepository implements StyleInterface {
    public function getAllStyles(){
        return Style::get();
    }

    public function createStyle($data) {
        // if(!empty($data['image'])){
        //     $data["image"] = $this->imageUpload($data["image"]);
        // }
        $data['slug'] = Str::slug($data['name']);
        $slug_count = DB::table('styles')->where('slug',$data['slug'])->count();
        if($slug_count>0){
            $data['slug'] = random_int(100000, 999999).'-'.$data['slug'];
        }
        $data["created_at"] = date("Y-m-d");
        return DB::table("styles")->insert($data);
    }
    // public function imageUpload($image){
    //     $content_db = time() . rand(0000, 9999) . "." . $image->getClientOriginalExtension();
    //     $image->storeAs("public/StyleImage", $content_db);
    //     return $content_db;
    // }

    public function getStyle($slug) {
        return Style::where("slug", $slug)->first();
    }


    public function updateStyle( $data, $slug) {
        // if(!empty($data['image'])){
        //     File::delete("storage/StyleImage/" . $this->getStyle($slug)->image);
        //     $data["image"] = $this->imageUpload($data["image"]);
        // }else {
        //     unset($data["image"]);
        // }
        return Style::where("slug", $slug)->update($data);
    }

    public function deleteStyle($slug){
        return Style::where("slug", $slug)->firstOrFail()->delete();
    }
}