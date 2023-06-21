<?php

Class LeverancierModel{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

      public function getLeveranciers(){
        {
            // Voer een query uit om klantgegevens op te halen
            $this->db->query("SELECT Leverancier.Naam,
                                     ContactPersoon,
                                     Email, 
                                     Mobiel, 
                                     LeverancierNummer,
                                     LeverancierType
                              FROM   Leverancier
                              INNER JOIN ContactPerLeverancier ON Leverancier.id = ContactPerLeverancier.LeverancierId
                              INNER JOIN Contact ON ContactPerLeverancier.ContactId = Contact.id;");
            $results = $this->db->resultSet();
            return $results;
        }
    }
     public function getProduct($id){
    $this->db->query("SELECT Leverancier.Naam, Product.SoortAllergie, Product.Barcode, Product.Houdbaarheidsdatum
    FROM Leverancier
    INNER JOIN ProductPerLeverancier ON Leverancier.id = ProductPerLeverancier.LeverancierId
    INNER JOIN Product ON Product.id = ProductPerLeverancier.ProductId
    WHERE Leverancier.id = :id");
    
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->resultSet();
}

    
     
public function getLeveranciersByType($leverancierType)
{
    $this->db->query("SELECT Naam, ContactPersoon, Email, Mobiel, LeverancierNummer, LeverancierType
                      FROM Leverancier
                      INNER JOIN ContactPerLeverancier ON Leverancier.id = ContactPerLeverancier.LeverancierId
                      INNER JOIN Contact ON ContactPerLeverancier.ContactId = Contact.id
                      WHERE LeverancierType = :leverancierType");
    $this->db->bind(':leverancierType', $leverancierType);
    return $this->db->resultSet();
}
}