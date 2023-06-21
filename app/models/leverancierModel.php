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
 public function getProduct($Id){
        $this->db->query("SELECT Leverancier.Naam, Product.SoortAllergie, Product.Barcode, Product.Houdbaarheidsdatum
FROM Leverancier
INNER JOIN ProductPerLeverancier ON Leverancier.id = ProductPerLeverancier.LeverancierId
INNER JOIN Product ON ProductPerLeverancier.ProductId = Product.id;
WHERE Leverancier.Id = :id;
;");
        $this->db->bind(':id', $Id, PDO::PARAM_INT);

        return $this->db->resultSet();
    }
    

    
     public function getProductId($Id)
    {
       {$this->db->query("SELECT 		
			LEV.Naam,
            PRO.SoortAllergie,
            PRO.Barcode,
            PRO.Houdbaarheidsdatum,
            PRO.Id
            
            FROM product as PRO
            INNER JOIN Leverancier as LEV
            ON LEV.Id = PRO.id
        
            WHERE LEV.Id = :id");
            $this->db->bind(':id', $Id, PDO::PARAM_INT);
            return $this->db->resultset();
       
    }
}
}