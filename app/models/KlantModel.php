<?php

Class KlantModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKlanten(){
        try{
        $this->db->query("SELECT
    GEZ.Naam,
    GEZ.AantalVolwassen,
    GEZ.AantalKinderen,
    GEZ.id,
    GEZ.AantaBabys,
    ADR.Plaats,
    CON.Telefoonnummer,
    CON.Email,
    WEN.Type
            FROM
    Gezin AS GEZ
            INNER JOIN Adres AS ADR
                ON ADR.PersoonId = GEZ.id
            INNER JOIN Contact AS CON
                ON CON.PersoonId = GEZ.id
            INNER JOIN User AS USR
                ON USR.GezinId = GEZ.id
            INNER JOIN Wensen AS WEN
                ON WEN.id = USR.WensenId;");
        $results = $this->db->resultSet();
                return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

   
    public function getSingleKlant($id){
      try{  $this->db->query("SELECT
    GEZ.Naam,
    GEZ.AantalVolwassen,
    GEZ.AantalKinderen,
    GEZ.AantaBabys,
    GEZ.id as Id,
    ADR.Plaats,
    CON.Telefoonnummer,
    CON.Email,
    WEN.Type
            FROM
    Gezin AS GEZ
            INNER JOIN Adres AS ADR
                ON ADR.PersoonId = GEZ.id
            INNER JOIN Contact AS CON
                ON CON.PersoonId = GEZ.id
            INNER JOIN User AS USR
                ON USR.GezinId = GEZ.id
            INNER JOIN Wensen AS WEN
                ON WEN.id = USR.WensenId
            WHERE GEZ.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    }
public function deleteKlant($id)
    {
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }


   

}