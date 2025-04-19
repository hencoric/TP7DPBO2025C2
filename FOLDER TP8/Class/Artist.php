<?php
class Artist {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllArtists($search)
    {
        $stmt = $this->db->prepare("SELECT * FROM artists WHERE name LIKE :search");
        $stmt->execute(['search' => '%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArtist($name) {
        $stmt = $this->db->prepare("INSERT INTO artists (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function editArtist($id, $name) {
        $stmt = $this->db->prepare("UPDATE artists SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    public function deleteArtist($id) {
        $stmt = $this->db->prepare("DELETE FROM artists WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

?>
