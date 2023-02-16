<?php
namespace App\Core\Material;

interface MaterialInterface {
    public function getAllMaterials();
    public function storeMaterial(array $data);
    public function getMaterial($slug);
    public function updateMaterial(array $data, $slug);
    public function deleteMaterial($slug);


}