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
                                     Leverancier.Id,
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
     public function getProduct($Id)
      {
        try {
            $this->db->query(' SELECT CPL.Id as CPLId, 
       LEV.Naam as Naam,
       PRO.SoortAllergie, 
       PRO.Barcode,
       PRO.Houdbaarheidsdatum 
        FROM ProductPerLeverancier as CPL 
        INNER JOIN Product as PRO 
        ON PRO.Id = CPL.ProductId
        INNER JOIN Leverancier as LEV 
        ON LEV.Id = CPL.LeverancierId
        WHERE CPL.id = :id;');
            $this->db->bind(':id', $Id);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

  public function getLeverancierId($Id){
        $this->db->query("SELECT 
                                 LEV.Naam 
                                ,LEV.LeverancierType
                                ,LEV.LeverancierNummer
                                ,LEV.Id
                            FROM    
                                Leverancier AS LEV
                            WHERE 
                                LEV.Id = :id");
        $this->db->bind(':id', $Id, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    


}