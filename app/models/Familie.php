<?php
  class Familie {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getFamilies() {
        $this->db->query("SELECT Gezin.*, Allergie.Type as Allergie FROM Gezin                    
                          INNER JOIN User ON Gezin.id = User.GezinId
                          INNER JOIN Allergie ON User.AllergieId = Allergie.id
                          WHERE User.IsActive = 1;
");
        $result = $this->db->resultSet();
        return $result;
    }

   public function getFamilyById($id) {
    $this->db->query('SELECT * FROM `Gezin` WHERE `id` = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

   public function getAllergies() {
    $this->db->query('SELECT * FROM `Allergie`');
    return $this->db->resultSet();
  }

   public function deleteFamilie($id) {
      $this->db->query("DELETE FROM Gezin WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }
  }

?>
