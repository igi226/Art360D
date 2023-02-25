<?php
namespace App\Core\Artworks;

interface ArtworkInterface {
    public function getAllArtworks();
    public function storeArtwork( array $data, $data2, $dataImage );
    public function getArtwork( $id );
    public function updateArtwork( array $data, $data2, $dataImage, $slug );
    public function deleteArtwork( $slug );
    public function putOnOffMarket( $id );
    public function deleteArtwork_image( $id );
}