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
                                         GEZ.Naam 
                                        
                                        ,ALG.Omschrijving
                                        ,GEZ.AantalVolwassenen
                                        ,GEZ.AantalKinderen
                                        ,GEZ.AantalBabys
                                        ,PER.Volledignaam
                                        ,GEZ.id
        
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

    public function getGezinById($id = NULL)
    { try {
        $this->db->query("SELECT 
                                Per.Volledigenaam 
                                ,Per.Id as PersoonId
                                ,per.TypePersoon 
                                ,per.IsVertegenwoordiger
                                ,Gez.Id as GezinId
                                ,Gez.Naam as GezinNaam
                                ,Gez.Omschrijving
                                ,Gez.TotaalAantalPersonen
                                ,ALG.Naam as AllergieNaam
                               
                                FROM
                                    gezin as GEZ
                                INNER JOIN persoon as PER
                                    ON PER.GezinId = GEZ.id
                                INNER JOIN allergieperpersoon as APP
                                    ON APP.PersoonId = PER.id
                                INNER JOIN allergie as ALG
                                    ON APP.AllergieId = ALG.id
                                    WHERE Gez.Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }

    public function getPersoon1($Id){
        $this->db->query("
                                SELECT 
                                         GEZ.Naam 
                                        
                                        ,ALG.Omschrijving
                                        ,GEZ.AantalVolwassenen
                                        ,GEZ.AantalKinderen
                                        ,GEZ.AantalBabys
                                        ,PER.Volledignaam
                                        ,GEZ.id
        
                             FROM
		                                gezin as GEZ
                             INNER JOIN persoon as PER
		                             ON PER.GezinId = GEZ.id
                             INNER JOIN allergieperpersoon as APP
		                             ON APP.PersoonId = PER.id
                             INNER JOIN allergie as ALG
		                             ON APP.AllergieId = ALG.id
                                     WHERE GEZ.id = :id;");
                                  
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->resultset();
    }

    public function getAllergie($id)
    {
        $this->db->query("SELECT 
                                     PER.Volledignaam
                                    ,PER.TypePersoon
                                    ,PER.IsVertegenwoordiger
                                    ,ALG.Naam
                                    ,PER.id
                         FROM
                                    persoon as PER
                         INNER JOIN Gezin as GEZ
                                 ON PER.GezinId = GEZ.id
                         INNER JOIN allergieperpersoon as APP
                                 ON APP.PersoonId = PER.id
                         INNER JOIN allergie as ALG
                                 ON APP.AllergieId = ALG.id
                         WHERE GEZ.id = :id;");
                                  
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->resultset();
    }

    public function getAllergieById($id = NULL)
    { try {
        $this->db->query("SELECT
                                Gez.Id as GezinsId
                                ,GEZ.Omschrijving as GezinOmschrijving
                                ,GEZ.AantalVolwassenen
                                ,GEZ.AantalKinderen
                                ,GEZ.AantalBabys
                                ,Gez.Naam as GezinNaam
                                ,Gez.Omschrijving
                                ,ALG.Omschrijving as AllergieOmschrijving
                                ,ALG.Naam as AllergieNaam
                                ,ALG.Id as AllergieId
                                ,PER.Volledignaam
                                ,PER.Id as PersoonId
                                ,PER.TypePersoon 
                                ,PER.IsVertegenwoordiger
                                FROM
                                    gezin as GEZ
                                INNER JOIN persoon as PER
                                    ON PER.GezinId = GEZ.id
                                INNER JOIN allergieperpersoon as APP
                                    ON APP.PersoonId = PER.id
                                INNER JOIN allergie as ALG
                                    ON APP.AllergieId = ALG.id
                                    WHERE IsVertegenwoordiger = 1 AND ALG.id = :id");
    $this->db->bind(':id', $id, PDO::PARAM_INT);
    $result = $this->db->resultSet();
    return $result;
} catch (PDOException $e) {
    echo $e->getMessage();
}
}

    public function updateAllergie($id, $persoonId)
    {
        try {
            $this->db->query('UPDATE allergieperpersoon SET persoonId = :persoonid WHERE id = :id');
            $this->db->bind("id", $id, PDO::PARAM_INT);
            $this->db->bind("persoonid", $persoonId, PDO::PARAM_INT);
            $this->db->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllergieAll()
    {
        try {
            $this->db->query('SELECT id, Naam FROM allergie;');
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>