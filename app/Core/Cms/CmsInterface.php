<?php
namespace App\Core\Cms;

interface CmsInterface {
    public function getHomePage();
    public function getbanner1Page();
    public function getbanner2Page();
    public function getbanner3Page();
    
    public function getAboutPage();
    
    public function getCms($slug);
    public function updateCms(array $data, $slug);
}
?>