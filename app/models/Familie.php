<?php
  class Familie {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getFamilies() {
        $this->db->query("SELECT ContactPerGezin.Id, Gezin.Naam, Contact.Straat, Contact.Adres, Contact.Huisnummer, Contact.Toevoeging, Contact.Postcode, Contact.Woonplaats, Contact.Email, Contact.Mobiel, Persoon.Voornaam, Persoon.Tussenvoegsel, Persoon.Achternaam, Persoon.Volledigenaam, Persoon.Geboortedatum, Persoon.TypePersoon, Persoon.IsVertegenwoordiger
                          FROM ContactPerGezin
                          INNER JOIN Gezin ON ContactPerGezin.GezinId = Gezin.Id
                          INNER JOIN Contact ON ContactPerGezin.ContactId = Contact.Id
                          INNER JOIN Persoon ON Persoon.GezinId = Gezin.Id;

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
  
   public function getPersoonById($id) {
     try{$this->db->query('SELECT * FROM `Persoon` WHERE `id` = :id');
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

public function updateContactForFamilie($familieId, $contactId)
{
    try {
    $this->db->query("UPDATE Gezin SET ContactId = :contactId WHERE id = :familieId");
    $this->db->bind(':contactId', $contactId);
    $this->db->bind(':familieId', $familieId);
    return $this->db->execute();
  } catch (PDOException $e) {
    // Handle the exception
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
