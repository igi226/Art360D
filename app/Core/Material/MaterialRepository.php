<?php
namespace App\Core\Material;

use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MaterialRepository implements MaterialInterface {
    public function getAllMaterials(){
        return Material::get();
    }

    public function storeMaterial($data){
        $data["created_at"] = date("Y-m-d");
        // dd($data);
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('artwork_subjects')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        return DB::table("materials")->insert($data);

    }
    public function getMaterial($slug){
        return Material::where("slug", $slug)->firstOrFail();
    }
    public function updateMaterial(array $data, $slug){
        $data["updated_at"] = date("Y-m-d");
        return Material::where("slug", $slug)->update($data);
    }
    public function deleteMaterial($slug){
        return Material::where("slug", $slug)->firstOrFail()->delete();
    }

}


