<?php
require_once 'config/db.php';

class Album {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllAlbums($search = '')
    {
        $stmt = $this->db->prepare("SELECT albums.id, albums.title, artists.name AS artist_name, albums.price 
                FROM albums 
                JOIN artists ON albums.artist_id = artists.id
                WHERE albums.title LIKE :search OR artists.name LIKE :search");
        $stmt->execute(['search' => '%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function addAlbum($title, $artist_id, $price) {
        $stmt = $this->db->prepare("INSERT INTO albums (title, artist_id, price) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $artist_id, $price]);
    }

    public function editAlbum($id, $title, $artist_id, $price) {
        $stmt = $this->db->prepare("UPDATE albums SET title = ?, artist_id = ?, price = ? WHERE id = ?");
        return $stmt->execute([$title, $artist_id, $price, $id]);
    }

    public function deleteAlbum($id) {
        $stmt = $this->db->prepare("DELETE FROM albums WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
