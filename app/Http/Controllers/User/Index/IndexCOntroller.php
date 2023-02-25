<?php

namespace App\Http\Controllers\User\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCOntroller extends Controller
{
    public function index(){
        return view('User.Index.index');
    }
}
