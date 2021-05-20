DELIMITER $$

	DROP PROCEDURE IF EXISTS UPD02$$

	CREATE PROCEDURE UPD02()
    BEGIN
		SET @table_schema:='sample';
		IF NOT EXISTS (SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
						WHERE TABLE_NAME = 'users'
                        AND COLUMN_NAME = 'role_id'
                        AND TABLE_SCHEMA = @table_schema)				
		THEN
			ALTER TABLE users ADD COLUMN role_id INT AFTER id;
		END IF;
                        
		IF NOT EXISTS (SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
						WHERE TABLE_NAME = 'users'
                        AND COLUMN_NAME = 'birthdate'
                        AND TABLE_SCHEMA = @table_schema)
		THEN
			ALTER TABLE users ADD COLUMN birthdate DATE;
		END IF;
        
        IF NOT EXISTS(SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
						WHERE TABLE_NAME = 'users'
                        AND COLUMN_NAME ='address'
                        AND TABLE_SCHEMA = @table_schema)
		THEN 
			ALTER TABLE users ADD COLUMN address varchar(255);
		END IF;
        
        IF NOT EXISTS(SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
						WHERE TABLE_NAME = 'users'
                        AND COLUMN_NAME ='image'
                        AND TABLE_SCHEMA = @table_schema)
		THEN 
			ALTER TABLE users ADD COLUMN image varchar(255);
		END IF;
        
        
	END$$


DELIMITER ;

CALL UPD02;