DELIMITER $$ 
	DROP PROCEDURE IF EXISTS loadUsers_sp$$
    
    CREATE PROCEDURE loadUsers_sp()
    BEGIN
		select u.id, u.first_name, u.last_name, u.image , r.name AS role_name
        FROM users AS u
        INNER JOIN roles AS r 
        ON u.role_id = r.id;
	END $$

DELIMITER ;

CALL loadUsers_sp();