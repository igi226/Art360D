<?php
namespace App\Core\Artists;

interface ArtistInterface {
    public function getAllArtists();
    public function storeArtist(array $data, $data2, $subscriptions_id);
    public function updateArtist(array $data, $data2, $subscriptions_id, $id);
    public function getSpecificArtist($id);
    public function deleteArtist($id);
    public function storeArtistType(array $data);
    public function updateArtistType(array $data, $id);
    public function getSpecificArtistType($id);
    public function getAllArtistsTypes();
    public function deleteArtistTypes($id);
    public function followUnfollow($artist_id) ;
    public function getFeaturedArtist();
    public function getCategoryArtist($artist_type_id);

    
}
