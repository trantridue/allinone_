-- MySQL Script generated by MySQL Workbench
-- 04/15/15 19:41:42
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema allinone
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `allinone` ;
CREATE SCHEMA IF NOT EXISTS `allinone` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `allinone` ;

-- -----------------------------------------------------
-- Table `allinone`.`shop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`shop` ;

CREATE TABLE IF NOT EXISTS `allinone`.`shop` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `address` VARCHAR(256) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `allinone`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`user` ;

CREATE TABLE IF NOT EXISTS `allinone`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `shop_id` INT NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(64) NULL,
  `phone_number` VARCHAR(16) NULL,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `confirmcode` VARCHAR(32) NULL DEFAULT 'y',
  `status` VARCHAR(1) NOT NULL DEFAULT 'Y',
  `start_date` DATETIME NOT NULL DEFAULT '2014-01-01 08:00:00',
  `end_date` DATETIME NULL DEFAULT '2020-12-31 22:00:00',
  `description` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_shop`
    FOREIGN KEY (`shop_id`)
    REFERENCES `allinone`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Employees Information';

CREATE INDEX `fk_user_shop_idx` ON `allinone`.`user` (`shop_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`role` ;

CREATE TABLE IF NOT EXISTS `allinone`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(8) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `allinone`.`user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`user_role` ;

CREATE TABLE IF NOT EXISTS `allinone`.`user_role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT NOT NULL,
  `description` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  CONSTRAINT `fk_user_role_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `allinone`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `allinone`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `fk_user_role_role_idx` ON `allinone`.`user_role` (`role_id` ASC);

CREATE INDEX `fk_user_role_user1_idx` ON `allinone`.`user_role` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`provider`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`provider` ;

CREATE TABLE IF NOT EXISTS `allinone`.`provider` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(16) NOT NULL,
  `address` VARCHAR(245) NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`import_facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`import_facture` ;

CREATE TABLE IF NOT EXISTS `allinone`.`import_facture` (
  `code` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(1000) NULL,
  `provider_id` INT NOT NULL,
  PRIMARY KEY (`code`),
  CONSTRAINT `fk_import_facture_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `allinone`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `code_UNIQUE` ON `allinone`.`import_facture` (`code` ASC);

CREATE INDEX `fk_import_facture_provider1_idx` ON `allinone`.`import_facture` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`provider_paid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`provider_paid` ;

CREATE TABLE IF NOT EXISTS `allinone`.`provider_paid` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `provider_id` INT NOT NULL,
  `amount` FLOAT NOT NULL,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_provider_paid_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `allinone`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_provider_paid_provider1_idx` ON `allinone`.`provider_paid` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`category` ;

CREATE TABLE IF NOT EXISTS `allinone`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`season`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`season` ;

CREATE TABLE IF NOT EXISTS `allinone`.`season` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_time` DATE NOT NULL,
  `end_time` DATE NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`sex`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`sex` ;

CREATE TABLE IF NOT EXISTS `allinone`.`sex` (
  `id` INT NOT NULL,
  `name` VARCHAR(6) NOT NULL DEFAULT 'woman',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`brand` ;

CREATE TABLE IF NOT EXISTS `allinone`.`brand` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`product` ;

CREATE TABLE IF NOT EXISTS `allinone`.`product` (
  `code` VARCHAR(16) NOT NULL,
  `name` VARCHAR(245) NOT NULL,
  `category_id` INT NOT NULL,
  `season_id` INT NOT NULL,
  `sex_id` INT NOT NULL,
  `export_price` FLOAT NOT NULL,
  `description` VARCHAR(1000) NULL,
  `brand_id` INT NOT NULL,
  `sale` FLOAT NOT NULL DEFAULT 0,
  `link` VARCHAR(255) NULL,
  PRIMARY KEY (`code`),
  CONSTRAINT `fk_product_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `allinone`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_season1`
    FOREIGN KEY (`season_id`)
    REFERENCES `allinone`.`season` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_sex1`
    FOREIGN KEY (`sex_id`)
    REFERENCES `allinone`.`sex` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_brand1`
    FOREIGN KEY (`brand_id`)
    REFERENCES `allinone`.`brand` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `code_UNIQUE` ON `allinone`.`product` (`code` ASC);

CREATE INDEX `fk_product_product_type1_idx` ON `allinone`.`product` (`category_id` ASC);

CREATE INDEX `fk_product_season1_idx` ON `allinone`.`product` (`season_id` ASC);

CREATE INDEX `fk_product_sex1_idx` ON `allinone`.`product` (`sex_id` ASC);

CREATE INDEX `fk_product_brand1_idx` ON `allinone`.`product` (`brand_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`product_import`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`product_import` ;

CREATE TABLE IF NOT EXISTS `allinone`.`product_import` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_code` VARCHAR(16) NOT NULL,
  `import_facture_code` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL,
  `import_price` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_product_import_product1`
    FOREIGN KEY (`product_code`)
    REFERENCES `allinone`.`product` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_import_import_facture1`
    FOREIGN KEY (`import_facture_code`)
    REFERENCES `allinone`.`import_facture` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_import_product1_idx` ON `allinone`.`product_import` (`product_code` ASC);

CREATE INDEX `fk_product_import_import_facture1_idx` ON `allinone`.`product_import` (`import_facture_code` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`config` ;

CREATE TABLE IF NOT EXISTS `allinone`.`config` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `value` VARCHAR(45) NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`fund`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`fund` ;

CREATE TABLE IF NOT EXISTS `allinone`.`fund` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`customer` ;

CREATE TABLE IF NOT EXISTS `allinone`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(12) NOT NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`product_return`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`product_return` ;

CREATE TABLE IF NOT EXISTS `allinone`.`product_return` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_code` VARCHAR(16) NOT NULL,
  `quantity` INT NOT NULL,
  `date` DATETIME NULL,
  `description` VARCHAR(245) NULL,
  `provider_id` INT NOT NULL,
  `return_price` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_product_return_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `allinone`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_return_provider1_idx` ON `allinone`.`product_return` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`customer_reservation_histo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`customer_reservation_histo` ;

CREATE TABLE IF NOT EXISTS `allinone`.`customer_reservation_histo` (
  `id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  `reservation_information` VARCHAR(255) NOT NULL,
  `amount` VARCHAR(45) NOT NULL DEFAULT 0,
  `status` VARCHAR(1) NOT NULL DEFAULT 'Y',
  `date` DATETIME NOT NULL,
  `complete_date` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_customer_reservation_histo_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `allinone`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_customer_reservation_histo_customer1_idx` ON `allinone`.`customer_reservation_histo` (`customer_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`fund_change_histo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`fund_change_histo` ;

CREATE TABLE IF NOT EXISTS `allinone`.`fund_change_histo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fund_id` INT NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(245) NULL,
  `ratio` FLOAT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_fund_change_histo_fund1`
    FOREIGN KEY (`fund_id`)
    REFERENCES `allinone`.`fund` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_fund_change_histo_fund1_idx` ON `allinone`.`fund_change_histo` (`fund_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`spend_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`spend_category` ;

CREATE TABLE IF NOT EXISTS `allinone`.`spend_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `allinone`.`spend`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`spend` ;

CREATE TABLE IF NOT EXISTS `allinone`.`spend` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `spend_category_id` INT NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `user_id` INT NOT NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_spend_spend_category1`
    FOREIGN KEY (`spend_category_id`)
    REFERENCES `allinone`.`spend_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spend_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `allinone`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_spend_spend_category1_idx` ON `allinone`.`spend` (`spend_category_id` ASC);

CREATE INDEX `fk_spend_user1_idx` ON `allinone`.`spend` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`product_deviation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`product_deviation` ;

CREATE TABLE IF NOT EXISTS `allinone`.`product_deviation` (
  `product_code` VARCHAR(16) NOT NULL,
  `quantity` FLOAT NOT NULL DEFAULT 0,
  `date` DATETIME NULL,
  `description` VARCHAR(245) NULL,
  CONSTRAINT `fk_product_deviation_product1`
    FOREIGN KEY (`product_code`)
    REFERENCES `allinone`.`product` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_deviation_product1_idx` ON `allinone`.`product_deviation` (`product_code` ASC);


-- -----------------------------------------------------
-- Table `allinone`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `allinone`.`news` ;

CREATE TABLE IF NOT EXISTS `allinone`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(1000) NULL,
  `date` DATETIME NULL,
  `shop_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_news_shop1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `allinone`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `allinone`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_news_shop1_idx` ON `allinone`.`news` (`shop_id` ASC);

CREATE INDEX `fk_news_user1_idx` ON `allinone`.`news` (`user_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `allinone`.`shop`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`shop` (`id`, `name`, `address`, `date`) VALUES (1, 'shop1', '19 Vạn Phúc - Hà Đông - Hà Nội', '2014-01-01 10:00:00');
INSERT INTO `allinone`.`shop` (`id`, `name`, `address`, `date`) VALUES (2, 'shop2', 'Số 3 Ngã Tư Lê Văn Lương - Vạn Phúc - Hà Đông - Hà Nội', '2014-01-01 10:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`) VALUES (1, 1, 'Trần Trí Duệ', 'trantridue@gmail.com', '0979355285', 'admin', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Ông chủ');
INSERT INTO `allinone`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`) VALUES (2, 2, 'Lê Thị Châu', 'zabuza.vn@gmail.com', '0966807709', 'chau', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Bà Chủ');
INSERT INTO `allinone`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`) VALUES (3, 1, 'Lê Thị Bảo', 'baobao170491@gmail.com', '01649785255', 'bao', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Nhân Viên');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`role`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`role` (`id`, `name`, `description`) VALUES (1, 'admin', 'Quản Trị');
INSERT INTO `allinone`.`role` (`id`, `name`, `description`) VALUES (2, 'editor', 'Nhập Liệu');
INSERT INTO `allinone`.`role` (`id`, `name`, `description`) VALUES (3, 'employee', 'Nhân Viên');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`user_role`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (1, 1, NULL, 1);
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (2, 2, NULL, 2);
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (3, 3, NULL, 3);
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (4, 2, NULL, 1);
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (5, 3, NULL, 2);
INSERT INTO `allinone`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (6, 3, NULL, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`provider`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (1, 'Kiểm Hàng', '0979355285', '19 Vạn Phúc Hà Đông Hà Nội', 'Chủ cửa hàng', NULL);
INSERT INTO `allinone`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (2, 'Hiền', '0988774433', 'Đặng Văn Ngữ', 'Nhà cung cấp lớn', NULL);
INSERT INTO `allinone`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (3, 'Zamy', '0906223781', 'nghi tàm', 'Nhà cung cấp quan trọng', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`import_facture`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`import_facture` (`code`, `date`, `description`, `provider_id`) VALUES ('20150107_001', '2015-01-07 10:10:10', 'Test facture', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`category`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`category` (`id`, `name`, `description`) VALUES (1, 'VAY', 'Các loại váy');
INSERT INTO `allinone`.`category` (`id`, `name`, `description`) VALUES (2, 'AO PHONG', 'Áo phông các loại');
INSERT INTO `allinone`.`category` (`id`, `name`, `description`) VALUES (3, 'QUAN JEANS', 'Các loại quần jeans');
INSERT INTO `allinone`.`category` (`id`, `name`, `description`) VALUES (4, 'CHAN VAY', 'Chân váy các loại');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`season`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (1, '2014-01-01', '2014-03-31', 'SPRING');
INSERT INTO `allinone`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (2, '2014-04-01', '2014-06-30', 'SUMMER');
INSERT INTO `allinone`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (3, '2014-07-01', '2014-09-30', 'AUTUMN');
INSERT INTO `allinone`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (4, '2014-10-01', '2014-12-31', 'WINTER');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`sex`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`sex` (`id`, `name`) VALUES (1, 'woman');
INSERT INTO `allinone`.`sex` (`id`, `name`) VALUES (2, 'man');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`brand`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`brand` (`id`, `name`) VALUES (1, 'MADEVN');
INSERT INTO `allinone`.`brand` (`id`, `name`) VALUES (2, 'F21');
INSERT INTO `allinone`.`brand` (`id`, `name`) VALUES (3, 'MGN');

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`product`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0001', 'Áo nam', 1, 1, 1, 1000, 'Helo', 1, 0, NULL);
INSERT INTO `allinone`.`product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0002', 'Quần jean', 2, 2, 2, 400, 'Tốt', 2, 0, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`product_import`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (1, '0001', '20150107_001', 10, 50);
INSERT INTO `allinone`.`product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (2, '0002', '20150107_001', 20, 200);

COMMIT;


-- -----------------------------------------------------
-- Data for table `allinone`.`customer`
-- -----------------------------------------------------
START TRANSACTION;
USE `allinone`;
INSERT INTO `allinone`.`customer` (`id`, `name`, `tel`, `description`, `date`) VALUES (1, 'Nhung HP', '0978663996', 'Thân', '2015-01-07 10:10:10');
INSERT INTO `allinone`.`customer` (`id`, `name`, `tel`, `description`, `date`) VALUES (2, 'Huong', '0978663993', 'Quen', '2015-01-07 10:11:11');

COMMIT;

