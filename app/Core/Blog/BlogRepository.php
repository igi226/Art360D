<?php
namespace App\Core\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use illuminate\Support\Str;

class BlogRepository implements BlogInterface {

    public function storeBlog(array $data) {
        $slug = Str::slug($data['title']);
        $slug_count = DB::table('blogs')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = random_int(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        if(!empty($data['image'])){
            $db_image = time() . rand(0000, 9999) . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->storeAs("public/BlogImage", $db_image);
            $data['image'] = $db_image;
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        
        return DB::table('blogs')->insert($data);
    }

    public function getAllBlogs(){
        return DB::table('blogs')->get();
    }

    public function getBlog($slug){
        return DB::table('blogs')->where('slug', $slug)->first();
    }

    public function updateBlog(array $data, $slug){
        $blog = Blog::where('slug', $slug)->firstOrFail();

        if(!empty($data['image'])){
            File::delete(public_path("storage/BlogImage/" . $blog->image));
            $db_image = time() . rand(0000, 9999) . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->storeAs("public/BlogImage", $db_image);
            $data['image'] = $db_image;
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        return $blog->update($data);
    }
}

?>