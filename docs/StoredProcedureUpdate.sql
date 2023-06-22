DELIMITER //

CREATE PROCEDURE UpdateLeverancierAndProduct(IN leverancier_id INT, IN new_bedrijfsnaam VARCHAR(255), IN new_adres VARCHAR(255), IN new_levering_datum DATETIME)
BEGIN
    UPDATE leverancier
    SET bedrijfsnaam = new_bedrijfsnaam, adres = new_adres
    WHERE id = leverancier_id;
    
    UPDATE product
    SET DatumEerstVolgendeLevering = new_levering_datum
    WHERE leverancierId = leverancier_id;
END //

DELIMITER ;

CALL UpdateLeverancierAndProduct(1, 'test', 'leersum, de Perken 2', '2023-06-26 14:30:00');