<?php
namespace App\Core\Artworks;

use App\Models\Artwork;
use App\Models\ArtworkImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ArtworkRepository implements ArtworkInterface {

    public function getAllArtworks(){
        return Artwork::orderBy('id','desc')->get();
    }
    public function storeArtwork( array $data, $data2, $dataImage ){
        // dd($dataImage);
        $artwork_insert = Artwork::create($data);
        if(!empty($data2)){
        foreach($data2 as $frameDetail){
            $slug = Str::slug($frameDetail['frame_type']);
            $slug_count = DB::table('frames')->where('slug',$slug)->count();
            if($slug_count>0){
                $slug = random_int(100000, 999999).'-'.$slug;
            }
            $frameDetail['slug'] = $slug;
            $frameDetail['artwork_id'] = $artwork_insert->id;
            $frame_insert = DB::table('frames')->insert($frameDetail);
            // return $frame_insert;

        }
    }
        
        if(!empty($dataImage)){
            return $this->imageUpload($dataImage, $artwork_insert->id);
        }

        return true;

    }

    public function imageUpload($dataImage, $artwork_id){
        foreach ($dataImage as $image) {
            $content_db = time() . rand(0000, 9999) . "." . $image->getClientOriginalExtension();
            $insert_image = DB::table("artwork_images")->insert([
                "artwork_id" => $artwork_id,
                "image" => $content_db,
                "created_at" => date('Y-m-d')
            ]);
            $image->storeAs("public/ArtworkImage", $content_db);
        }
        return $insert_image;
    }
    public function getArtwork( $id ){
      return Artwork::findOrFail($id);  
    }
    public function updateArtwork( array $data,  $data2, $dataImage, $id ){
        Artwork::where('id', $id)->update($data);
        if(!empty($data2)){
            foreach($data2 as $frameDetail){
                $slug = Str::slug($frameDetail['frame_type']);
                $slug_count = DB::table('frames')->where('slug',$slug)->count();
                if($slug_count>0){
                    $slug = random_int(100000, 999999).'-'.$slug;
                }
                $frameDetail['slug'] = $slug;
                $frameDetail['artwork_id'] = $id;
                $frame_insert = DB::table('frames')->insert($frameDetail);
                // return $frame_insert;
            }
            }
            if(!empty($dataImage)){
                return $this->imageUpload($dataImage, $id);
            }
            return true;
    
        
    }
    public function deleteArtwork( $slug ){
        
    }

    public function putOnOffMarket( $id ){
        $artwork = Artwork::findOrFail($id);
        if($artwork->on_market == 0){
            return $artwork->update(['on_market' => 1]);
        }else{
            return $artwork->update(['on_market' => 0]);
        }
    }

    public function deleteArtwork_image( $id ) {
        $delete = ArtworkImage::findOrFail($id);
        File::delete("storage/ArtworkImage/" . $delete->image);
        return $delete->delete();

    }
}

