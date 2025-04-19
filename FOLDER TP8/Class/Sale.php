<?php
class Sale {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllSales() {
        $query = "SELECT sales.id, albums.title, sales.quantity, sales.sale_date 
                  FROM sales
                  JOIN albums ON sales.album_id = albums.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSale($album_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO sales (album_id, quantity, sale_date) VALUES (?, ?, NOW())");
        return $stmt->execute([$album_id, $quantity]);
    }

    public function editSale($id, $album_id, $quantity) {
        $stmt = $this->db->prepare("UPDATE sales SET album_id = ?, quantity = ? WHERE id = ?");
        return $stmt->execute([$album_id, $quantity, $id]);
    }

    public function deleteSale($id) {
        $stmt = $this->db->prepare("DELETE FROM sales WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

?>
