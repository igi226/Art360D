<?php
namespace App\Core\ArtworkSubject;

interface ArtworkSubjectInterface {
    public function getAllSubjects();
    public function storeArtworkSubject(array $data);
    public function getSubject($slug);
    public function updateSubject(array $data, $slug);
    public function deleteSubject($slug);

}