<?php
namespace App\Core\Cms;

interface CmsInterface {
    public function getHomePage();
    public function getAboutPage();
    
    public function getCms($slug);
    public function updateCms(array $data, $slug);
}
?>