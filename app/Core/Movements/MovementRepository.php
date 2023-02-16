<?php
namespace App\Core\Movements;

use App\Models\Movement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MovementRepository implements MovementInterface {
    public function getAllMovements(){
        return Movement::get();
    }
    public function getMovement($slug){
        return Movement::where("slug", $slug)->firstOrFail();
    }
    public function storeMovement(array $data){
        $data["created_at"] = date("Y-m-d");
        // dd($data);
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('movements')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        return DB::table("movements")->insert($data);
    }
    public function updateMovement(array $data, $slug){
        $data["updated_at"] = date("Y-m-d");
        return Movement::where("slug", $slug)->update($data);
    }
    public function deleteMovement($slug){
        return Movement::where("slug", $slug)->firstOrFail()->delete();
    }
}

