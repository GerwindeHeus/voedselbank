DELIMITER $$
CREATE PROCEDURE add_leverancier(
    IN p_naam VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_telefoonnummer INT,
    IN p_bedrijfsnaam VARCHAR(50),
    IN p_adres VARCHAR(100),
    IN p_DatumEerstVolgendeLevering DATETIME
)
BEGIN
    DECLARE p_contactpersoon_id INT DEFAULT 0;
    
    -- Insert into leveranciercontactpersoon table
    INSERT INTO leveranciercontactpersoon(id, Naam, Email, Telefoonnummer)
    VALUES (NULL, p_naam, p_email, p_telefoonnummer);
    
    SET p_contactpersoon_id = LAST_INSERT_ID();
    
    
    -- Insert into leverancier table
    INSERT INTO leverancier(id, LeverancierContactPersoonId, Bedrijfsnaam, adres)
    VALUES (NULL, p_contactpersoon_id, p_bedrijfsnaam, p_adres);
    
    SET p_contactpersoon_id = LAST_INSERT_ID();
    
    
    INSERT INTO product (id, ProductCategorieId, LeverancierId, DatumEerstVolgendeLevering)
    VALUES (NULL, p_contactpersoon_id, p_contactpersoon_id, p_DatumEerstVolgendeLevering);
    
    SELECT p_contactpersoon_id AS 'Contactpersoon ID';
END$$
DELIMITER ;

CALL add_leverancier('Gerwin', 'Gerwin@gmail.com', 1234567890, 'test', 'Test, straat 1', '2023-06-03 14:00:00');