<?php
namespace App\Core\Collection;

interface CollectionInterface {
    public function getAllCollections();
    public function createCollections( array $data );
    public function getCollection($slug);
    public function updateCollection(array $data, $slug);
    public function deleteCollection($slug);
    public function collectionsChangeS($slug);
}