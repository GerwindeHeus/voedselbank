DELIMITER $$
CREATE PROCEDURE delete_data_with_variable(IN p_id INT)
BEGIN
    -- Delete from product table
    DELETE FROM product WHERE id = p_id;
    
    -- Delete from leverancier table
    DELETE FROM leverancier WHERE id = p_id;
    
    -- Delete from leveranciercontactpersoon table
    DELETE FROM leveranciercontactpersoon WHERE id = p_id;
    
    SELECT 'Data deleted successfully!' AS Result;
END$$
DELIMITER ;