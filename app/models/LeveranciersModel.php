<?php

class LeveranciersModel
{
    private $db;

    public function __construct()
    {   
        $this->db = new Database; 
    }

    public function getLeverancier()
    {
        $this->db->query('select 
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
    }

    public function getSingleLeverancier($id = NULL)
    {
        $this->db->query("select 
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
    }

    public function updateLeverancier($post)
    {
        //CALL UpdateLeverancierAndProduct(1, 'test', 'leersum, de Perken 2', '2023-06-26 14:30:00');
        $this->db->query("CALL UpdateLeverancierAndProduct(:id, :bedrijfsnaam, :adres, :DatumEerstVolgendeLevering);");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':bedrijfsnaam', $post['bedrijfsnaam']);
        $this->db->bind(':adres', $post['adres']);
        $this->db->bind(':DatumEerstVolgendeLevering', $post['DatumEerstVolgendeLevering']);
        $this->db->execute();

    }

}

?>