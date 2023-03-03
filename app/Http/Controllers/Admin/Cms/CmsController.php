<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Core\Cms\CmsInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;
class CmsController extends Controller
{
    private $cms_s;

    public function __construct( CmsInterface $cmsInterface ){
        $this->cms_s = $cmsInterface;
    }
   
    public function index()
    {
        $data['homePage'] = $this->cms_s->getHomePage();
        return view('Admin.Cms.homePage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|string'
       ]);

       $data = $request->except('_token');
        $slug = Str::slug($data['title']);
        $slug_count = DB::table('cms')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        if($request->has('image')){
            $file = $request->file('image');
            $db_image = time(). rand(0000, 9999). '.'. $file->getClientOriginalExtension();
            $file->storeAs("public/CmsImage", $db_image);
            $data['image'] = $db_image;
        }

        DB::table('cms')->insert($data);
        return back()->with('msg', 'Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
