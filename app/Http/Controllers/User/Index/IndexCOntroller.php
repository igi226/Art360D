<?php

namespace App\Http\Controllers\User\Index;

use App\Core\Artworks\ArtworkInterface;
use App\Core\Category\CategoryInterface;
use App\Core\Cms\CmsInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCOntroller extends Controller
{
    private $categories;
    private $cms_s;
    private $artworks;

    public function __construct( CategoryInterface $categoryInterface, CmsInterface $cmsInterface, ArtworkInterface $artworkInterface ){
        $this->categories = $categoryInterface;
        $this->cms_s = $cmsInterface;
        $this->artworks = $artworkInterface;
    }
    public function index(){
        $data= [
            'categories' => $this->categories->getAllCategory(),
            'banner1' => $this->cms_s->getbanner1Page(),
            'banner2' => $this->cms_s->getbanner2Page(),
            'banner3' => $this->cms_s->getbanner3Page(),
            'featuredProducts' => $this->artworks->getfearutedProducts(),
        ];
        return view('User.Index.index', $data);
    }
}
