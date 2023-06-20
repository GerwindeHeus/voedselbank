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
    try{$this->db->query('SELECT * FROM `Gezin` WHERE `id` = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
    }catch(PDOException $e){
    }  
  }

  public function updateAllergieForFamilie($familieId, $allergieId)
{
  try{$this->db->query("UPDATE User SET AllergieId = :allergieId WHERE id = :familieId");
    $this->db->bind(':allergieId', $allergieId);
    $this->db->bind(':familieId', $familieId);
    return $this->db->execute();
  }catch(PDOException $e){
  } 
}

   public function getAllergies() {
    try{$this->db->query('SELECT * FROM `Allergie`');
    return $this->db->resultSet();
    }catch(PDOException $e){
      echo $e->getMessage();
  }
}

   public function deleteFamilie($id) {
    try{$this->db->query("DELETE FROM Gezin WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }catch(PDOException $e){
    }
    }
  }

?>
