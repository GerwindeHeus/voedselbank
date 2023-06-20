<?php

class LeveranciersModel
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database; 
    }

    //functie om alle leveranciers op te halen
    public function getLeverancier()
    {
        try{$this->db->query('select 
		                            LEV.bedrijfsnaam
                                   ,LEV.adres 
                                   ,LEV.id
        
                                   ,PRO.DatumEerstVolgendeLevering
        
                                   ,LCP.Naam
                                   ,LCP.Email
                                   ,LCP.Telefoonnummer
                          from
		                            leverancier as LEV
                          INNER JOIN    product AS PRO
                          ON		    PRO.LeverancierId = LEV.id
                          INNER JOIN    leveranciercontactpersoon AS LCP
                          ON		    LEV.LeverancierContactPersoonId = LCP.id;');
            $results = $this->db->resultSet();
            return $results;
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //functie om de contactpersoon van een leverancier op te halen
    public function getContactPersoon($id)
    {
       try{$this->db->query('select 
		                            LEV.bedrijfsnaam
                                   ,LEV.adres 
                                   ,LEV.id
        
                                   ,PRO.DatumEerstVolgendeLevering
        
                                   ,LCP.Naam
                                   ,LCP.Email
                                   ,LCP.Telefoonnummer
                          from
		                            leverancier as LEV
                          INNER JOIN    product AS PRO
                          ON		    PRO.LeverancierId = LEV.id
                          INNER JOIN    leveranciercontactpersoon AS LCP
                          ON		    LEV.LeverancierContactPersoonId = LCP.id
                          WHERE LEV.id = :id;');
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            return $this->db->resultset();
       }catch(PDOException $error){
           echo $error->getMessage();
    }
}

    //functie om een enkele leverancier op te halen
    public function getSingleLeverancier($id = NULL)
    {
        try{$this->db->query("select 
		                            LEV.bedrijfsnaam
                                   ,LEV.adres
                                   ,LEV.id 
        
                                   ,PRO.DatumEerstVolgendeLevering
        
                                   ,LCP.Naam
                                   ,LCP.Email
                                   ,LCP.Telefoonnummer
                          from
		                            leverancier as LEV
                          INNER JOIN    product AS PRO
                          ON		    PRO.LeverancierId = LEV.id
                          INNER JOIN    leveranciercontactpersoon AS LCP
                          ON		    LEV.LeverancierContactPersoonId = LCP.id
                          WHERE LEV.id = :id;");
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            return $this->db->single();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //functie om een leverancier te updaten
    public function updateLeverancier($post)
    {
        //CALL UpdateLeverancierAndProduct(1, 'test', 'leersum, de Perken 2', '2023-06-26 14:30:00');
        try{$this->db->query("CALL UpdateLeverancierAndProduct(:id, :bedrijfsnaam, :adres, :DatumEerstVolgendeLevering);");
            $this->db->bind(':id', $post['id']);
            $this->db->bind(':bedrijfsnaam', $post['bedrijfsnaam']);
            $this->db->bind(':adres', $post['adres']);
            $this->db->bind(':DatumEerstVolgendeLevering', $post['DatumEerstVolgendeLevering']);
            $this->db->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }

    }

    //functie om een leverancier toe te voegen
    public function addLeverancier($post)
    {
        //CALL add_leverancier('Gerwin', 'Gerwin@gmail.com', 1234567890, 'test', 'Test, straat 1', '2023-06-03 14:00:00');
        try{$this->db->query("CALL add_leverancier(:Naam, :Email, :Telefoonnummer, :Contactpersoon, :Adres, :DatumEerstVolgendeLevering);");
            $this->db->bind(':Naam', $post['Naam']);
            $this->db->bind(':Email', $post['Email']);
            $this->db->bind(':Telefoonnummer', $post['telefoonnummer']);
            $this->db->bind(':Contactpersoon', $post['bedrijfsnaam']);
            $this->db->bind(':Adres', $post['adres']);
            $this->db->bind(':DatumEerstVolgendeLevering', $post['DatumEerstVolgendeLevering']);
            return  $this->db->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //functie om een leverancier te verwijderen
    public function deleteLeverancier($id)
    {
        //CALL delete_data_with_variable(8);
        try{$this->db->query("CALL delete_data_with_variable(:id);");
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            return $this->db->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

}

?>