<?php

namespace App\Http\Controllers\User\Index;

use App\Core\Artworks\ArtworkInterface;
use App\Core\Category\CategoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCOntroller extends Controller
{
    private $categories;

    public function __construct( CategoryInterface $categoryInterface ){
        $this->categories = $categoryInterface;
    }
    public function index(){
        $data= [
            'categories' => $this->categories->getAllCategory()
        ];
        return view('User.Index.index', $data);
    }
}
