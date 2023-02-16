<?php
namespace App\Core\Category;

interface CategoryInterface {
    public function getAllCategory();
    public function getCategory($slug);
    public function storeCategory(array $data);
    public function updateCategory(array $data, $slug);
    public function deleteCategory($slug);
}
