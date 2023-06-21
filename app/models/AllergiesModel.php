<?php

class AllergiesModel
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database; 
    }

    public function getPersoon()
    {
        try{$this->db->query('SELECT 
                                         GEZ.Code
                                        ,GEZ.Naam
                                        ,ALG.Omschrijving
                                        ,GEZ.AantalVolwassenen
                                        ,GEZ.AantalKinderen
                                        ,GEZ.AantalBabys
                                        ,PER.Volledignaam
        
                             FROM
		                                gezin as GEZ
                             INNER JOIN persoon as PER
		                             ON PER.GezinId = GEZ.id
                             INNER JOIN allergieperpersoon as APP
		                             ON APP.PersoonId = PER.id
                             INNER JOIN allergie as ALG
		                             ON APP.AllergieId = ALG.id
                             WHERE PER.IsVertegenwoordiger = 1');
            $results = $this->db->resultSet();
            return $results;
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

}

?>