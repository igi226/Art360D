<?php

namespace App\Http\Controllers\User\Artist;
use App\Core\Artists\ArtistInterface;
use App\Http\Controllers\Controller;
use App\Models\ArtworkCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    private $artist;

    public function __construct( ArtistInterface $artist)
    {
        $this->artist = $artist;
    }
    public function artist() {
        // dd(auth()->id());
        $data['artists'] =  User::with('total_artworks')->get();
        $data['categories'] =  ArtworkCategory::get();
        // $data['active'] = DB::table('artist_likes')->
    //    dd($data);
        return view('User.Artist.artist', $data);
    }

    public function artistDetails($id) {
        $data['artist'] = $this->artist->getSpecificArtist($id);
        return view('User.Artist.artistDetails', $data);
    }

    public function artistLike( Request $request ) {
        $data = DB::table('artist_likes');
        $check = $data->where('artist_id', $request->artist_id)->where('user_id', auth()->id())->first();
        if($check){
             $data->delete();
             return response()->json([
                'msg' => 'Dislike'
             ]);
        }else{
             $data->insert([
                'artist_id' => $request->artist_id,
                'user_id' => auth()->id(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return response()->json([
                'msg' => 'Like'
             ]);

        }
    }
}

?>
