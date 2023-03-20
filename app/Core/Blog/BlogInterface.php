<?php
namespace App\Core\Blog;

interface BlogInterface {
    public function storeBlog(array $data);
    public function getAllBlogs();
    public function getBlog($slug);
    public function updateBlog(array $data, $slug);
    public function deleteBlog($slug);

}
?>