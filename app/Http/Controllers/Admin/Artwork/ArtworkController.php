<?php

namespace App\Http\Controllers\Admin\Artwork;

use App\Core\Artists\ArtistInterface;
use App\Core\Artworks\ArtworkInterface;
use App\Core\ArtworkSubject\ArtworkSubjectInterface;
use App\Core\Category\CategoryInterface;
use App\Core\Collection\CollectionInterface;
use App\Core\Material\MaterialInterface;
use App\Core\Movements\MovementInterface;
use App\Core\Style\StyleInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtworkRequest;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtworkController extends Controller
{
    private $artworks;
    private $styles;
    private $artists;
    private $categories;
    private $collections;
    private $materials;
    private $movements;
    private $subjects;
   

    public function __construct( 
        ArtworkInterface $artworkInterface, 
        StyleInterface $styleInterface, 
        ArtistInterface $artistInterface, 
        CategoryInterface $categoryInterface,
        CollectionInterface $collectionInterface,
        ArtworkSubjectInterface $artworkSubjectInterface,
        MaterialInterface $materialInterface,
        MovementInterface $movementInterface,
        ){
        $this->artworks = $artworkInterface;
        $this->styles = $styleInterface;
        $this->artists = $artistInterface;
        $this->categories = $categoryInterface;
        $this->collections = $collectionInterface;
        $this->subjects = $artworkSubjectInterface;
        $this->materials = $materialInterface;
        $this->movements = $movementInterface;
    }
    public function index()
    {
       $data['artworks'] = $this->artworks->getAllArtworks();
       return view("Admin.Artworks.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'artists' => $this->artists->getAllArtists(),
            'categories' => $this->categories->getAllCategory(),
            'collections' => $this->collections->getAllCollections(),
            'styles' => $this->styles->getAllStyles(),
            'subjects' => $this->subjects->getAllSubjects(),
            'materials' => $this->materials->getAllMaterials(),
            'movements' => $this->movements->getAllMovements(),
        ];
        return view('Admin.Artworks.create', $data);
    }

    
    public function store(ArtworkRequest $request)
    {
        $data = $request->except('_token', 'frameDetails', 'category_ids', 'artwork_type','image');
        $data['category_ids'] = implode(',',$request->category_ids);
        $data['artwork_type'] = implode(',',$request->artwork_type);

        $data2 = $request->frameDetails;
        $dataImage = $request->image;
        $store = $this->artworks->storeArtwork($data, $data2, $dataImage);
        if($store){
            return redirect()->route('artworks.index')->with('msg', 'Artwork created successfully');
        }else{
            return back()->with('msg', 'Some error occur!');
        }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['artwork'] = $this->artworks->getArtwork($id);
       return view('Admin.artworks.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['artwork'] = $this->artworks->getArtwork($id);
        // dd($data['artwork']->artwork_frames);
        $data['artists'] = DB::table('users')->whereNotIn('id', [$data['artwork']->artist_id])->get();
        // $data['categories'] =  DB::table('artwork_categories')->whereNotIn('id', explode(',',$data['artwork']->category_ids))->get();
        $data['categories'] = $this->categories->getAllCategory();
        $data['collections'] = $this->collections->getAllCollections();
        $data['styles'] = $this->styles->getAllStyles();
        $data['subjects'] = $this->subjects->getAllSubjects();
        $data['materials'] = $this->materials->getAllMaterials();
        $data['movements'] = $this->movements->getAllMovements();
        return view('Admin.Artworks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method', 'frameDetails', 'category_ids', 'artwork_type','image');
        $data['category_ids'] = implode(',',$request->category_ids);
        $data['artwork_type'] = implode(',',$request->artwork_type);

        $data2 = $request->frameDetails;
        $dataImage = $request->image;
        $update = $this->artworks->updateArtwork($data, $data2, $dataImage, $id);
        if($update) {
            return redirect()->route('artworks.index')->with('msg', 'Artwork updated successfully');
        }else{
            return back()->with('msg', 'Some error occur!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function putOnOffMarket( Request $request ) {
        if($this->artworks->putOnOffMarket($request->id)){
            return response()->json([
                'msg' => 'Market status updated successfully.'
            ]);
        }else {
            return response()->json([
                'msg' => 'Some error occur, try again'
            ]);
        }
        
    }

    public function deleteArtworkImage( Request $request) {
        if($this->artworks->deleteArtwork_image($request->id)){
            return response()->json([
                'msg' => 'The image has been removed permanently.'
            ]);
        }else{
            return response()->json([
                'msg' => 'some error occur, try again.'
            ]);
        }
    }
}
