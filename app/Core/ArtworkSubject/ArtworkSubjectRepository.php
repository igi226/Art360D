<?php
namespace App\Core\ArtworkSubject;

use App\Models\ArtworkSubject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ArtworkSubjectRepository implements ArtworkSubjectInterface {
    // define('TABLE', DB::table("artwork_subjects"));
    public function getAllSubjects() {
        return DB::table("artwork_subjects")->get();
    }

    public function storeArtworkSubject($data){
        $data["created_at"] = date("Y-m-d");
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('artwork_subjects')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        
        return DB::table("artwork_subjects")->insert($data);
    }

    public function getSubject($slug){
        return DB::table("artwork_subjects")->where("slug", $slug)->first();
    }
    public function updateSubject(array $data, $slug){
        return ArtworkSubject::where("slug", $slug)->update($data);
    }
    public function deleteSubject($slug){
        return ArtworkSubject::where("slug", $slug)->firstOrFail()->delete();
    }


}