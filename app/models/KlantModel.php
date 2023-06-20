<?php

Class KlantModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKlanten(){
        $this->db->query("SELECT
    GEZ.Naam,
    GEZ.AantalVolwassen,
    GEZ.AantalKinderen,
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
    ON WEN.id = USR.WensenId; ");

        return $this->db->resultSet();
        
    }

    public function deleteKlant($id)
    {
        //call stored procedure deleteKlant
        $this->db->query("CALL deleteKlant(:id)");
    }
 
}