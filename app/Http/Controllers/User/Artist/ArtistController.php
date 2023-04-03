<?php

namespace App\Http\Controllers\User\Artist;

use App\Core\Artists\ArtistInterface;
use App\Http\Controllers\Controller;
use App\Models\ArtistType;
use App\Models\ArtworkCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArtistController extends Controller
{
    private $artist;

    public function __construct(ArtistInterface $artist)
    {
        $this->artist = $artist;
    }
    public function artist()
    {
        // dd(auth()->id());
        $data['artists'] = User::with('total_artworks')->get();
        $data['artist_types'] = ArtistType::get();
        // $data['active'] = DB::table('artist_likes')->
        //    dd($data);
        return view('User.Artist.artist', $data);
    }

    public function artistDetails($id)
    {
        $data['artist'] = $this->artist->getSpecificArtist($id);
        return view('User.Artist.artistDetails', $data);
    }

    public function artistLike(Request $request)
    {
        $data = DB::table('artist_likes');
        $check = $data->where('artist_id', $request->artist_id)->where('user_id', auth()->id())->first();
        if ($check) {
            $data->delete();
            return response()->json([
                'msg' => 'Dislike'
            ]);
        } else {
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

    public function artistFollow(Request $request)
    {
        return response()->json([
            'msg' => $this->artist->followUnfollow($request->artist_id)
        ]);
    }

    public function getFeaturedArtist()
    {
        $data_S = $this->artist->getFeaturedArtist();
        $html = '<div class="row" id="featured-artist">';
        foreach ($data_S as $data) {
            $html .= '<div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="' . route('user.artistDetails', $data->user_id) . '">';
            if (isset($data->user->image) && !empty($data->user->image && File::exists(public_path('storage/UserImage/' . $data->user->image))))
                $html .= '<img src="' . asset('storage/UserImage/' . $data->user->image) . '">';
            else {
                $html .= '<img src="' . asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') . '">';
            }
            $html .= '</a>
                </div>
                <div class="card-body">
                    <h2>
                        <a
                            href="' . route('user.artistDetails', $data->user->slug) . '">' . $data->user->first_name . ' ' . $data->user->last_name . '</a>
                    </h2>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>' . $data->user->address . '
                    </p>
                    <h4 class="artworkbadge">Artworks (' . $data->user->total_artworks->count() . ')</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">';

            $check = DB::table('artist_likes')
                ->where('artist_id', $data->user_id)
                ->where('user_id', auth()->id())
                ->first();
            if ($check) {
                $active = 'active';
                $liked = 'Liked';
            } else {
                $active = '';
                $liked = 'Like';
            }

            $checkFollow = DB::table('artist_follows')
                ->where('artist_id', $data->user_id)
                ->where('user_id', auth()->id())
                ->first();
            if ($checkFollow) {
                $active_f = 'active';
                $followed = 'Following';
            } else {
                $active_f = '';
                $followed = 'Follow';
            }

            $html .= '<a id="likeBtnArtist' . $data->user_id . '"
                            onclick="likeBtnArtist(' . $data->user_id . ', ' . auth()->id() . ')"
                            class="btn likebtn ' . $active . '">
                            <i class="far fa-thumbs-up"></i>
                            ' . $liked . '
                        </a>
                        <a class="btn likebtn ' . $active_f . '" id="followBtnArtist' . $data->user_id . '"
                            onclick="followBtnArtist(' . $data->user_id . ', ' . auth()->id() . ')">
                            <i class="fas fa-plus-circle"></i> ' . $followed . ' </a>
                    </div>
                </div>
            </div>
        </div>';
        }
        $html .= '</div>';



        return $html;

    }

    public function categoryWiseArtist(Request $request)
    {
        $data_S = $this->artist->getCategoryArtist($request->artist_type_id);
        // dd($data_S);
        $html = ' <div class="row" id="category-artist">';
        foreach ($data_S as $data) {
            $html .= '<div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="' . route('user.artistDetails', $data->user_id) . '">';
            if (isset($data->user->image) && !empty($data->user->image && File::exists(public_path('storage/UserImage/' . $data->user->image))))
                $html .= '<img src="' . asset('storage/UserImage/' . $data->user->image) . '">';
            else {
                $html .= '<img src="' . asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') . '">';
            }
            $html .= '</a>
                </div>
                <div class="card-body">
                    <h2>
                        <a
                            href="' . route('user.artistDetails', $data->user->slug) . '">' . $data->user->first_name . ' ' . $data->user->last_name . '</a>
                    </h2>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>' . $data->user->address . '
                    </p>
                    <h4 class="artworkbadge">Artworks (' . $data->user->total_artworks->count() . ')</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">';

            $check = DB::table('artist_likes')
                ->where('artist_id', $data->user_id)
                ->where('user_id', auth()->id())
                ->first();
            if ($check) {
                $active = 'active';
                $liked = 'Liked';
            } else {
                $active = '';
                $liked = 'Like';
            }

            $checkFollow = DB::table('artist_follows')
                ->where('artist_id', $data->user_id)
                ->where('user_id', auth()->id())
                ->first();
            if ($checkFollow) {
                $active_f = 'active';
                $followed = 'Following';
            } else {
                $active_f = '';
                $followed = 'Follow';
            }

            $html .= '<a id="likeBtnArtist' . $data->user_id . '"
                            onclick="likeBtnArtist(' . $data->user_id . ', ' . auth()->id() . ')"
                            class="btn likebtn ' . $active . '">
                            <i class="far fa-thumbs-up"></i>
                            ' . $liked . '
                        </a>
                        <a class="btn likebtn ' . $active_f . '" id="followBtnArtist' . $data->user_id . '"
                            onclick="followBtnArtist(' . $data->user_id . ', ' . auth()->id() . ')">
                            <i class="fas fa-plus-circle"></i> ' . $followed . ' </a>
                    </div>
                </div>
            </div>
        </div>';
        }
        $html .= '</div>';


        return $html;
    }

    public function artistProfile() {
        return view('User.Dashboard.profile');
    }
}

?>