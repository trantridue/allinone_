DELIMITER $$

DROP PROCEDURE IF EXISTS `allinone`.`insertData` $$
CREATE PROCEDURE `allinone`.`insertData`()
BEGIN

declare v_max int unsigned default 1000;
  declare v_counter int unsigned default 0;
truncate table customer;
  while v_counter < v_max do
    insert into customer(name,tel,description,date) values (concat('customer_number_',v_counter),concat('098809227',v_counter),concat('Khach so_',v_counter),now());
    set v_counter=v_counter+1;
  end while;

END $$

DELIMITER ;