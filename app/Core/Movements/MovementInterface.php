<?php
namespace App\Core\Movements;

interface MovementInterface {
    public function getAllMovements();
    public function getMovement($slug);
    public function storeMovement(array $data);
    public function updateMovement(array $data, $slug);
    public function deleteMovement($slug);
}
