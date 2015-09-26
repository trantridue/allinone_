-- MySQL Script generated by MySQL Workbench
-- 09/26/15 18:00:55
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema zabuzachaule
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `zabuzachaule` ;
CREATE SCHEMA IF NOT EXISTS `zabuzachaule` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `zabuzachaule` ;

-- -----------------------------------------------------
-- Table `zabuzachaule`.`shop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`shop` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`shop` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `address` VARCHAR(256) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`user` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`user` (
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
  `salary_by_hour` FLOAT NOT NULL DEFAULT 7692,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_shop`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zabuzachaule`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Employees Information';

CREATE INDEX `fk_user_shop_idx` ON `zabuzachaule`.`user` (`shop_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`role` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(8) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`user_role` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`user_role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT NOT NULL,
  `description` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  CONSTRAINT `fk_user_role_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `zabuzachaule`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `fk_user_role_role_idx` ON `zabuzachaule`.`user_role` (`role_id` ASC);

CREATE INDEX `fk_user_role_user1_idx` ON `zabuzachaule`.`user_role` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`provider`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`provider` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`provider` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(16) NOT NULL,
  `address` VARCHAR(245) NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`import_facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`import_facture` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`import_facture` (
  `code` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(1000) NULL,
  `provider_id` INT NOT NULL,
  `deadline` DATETIME NULL,
  `link` VARCHAR(255) NULL,
  PRIMARY KEY (`code`),
  CONSTRAINT `fk_import_facture_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `zabuzachaule`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `code_UNIQUE` ON `zabuzachaule`.`import_facture` (`code` ASC);

CREATE INDEX `fk_import_facture_provider1_idx` ON `zabuzachaule`.`import_facture` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`provider_paid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`provider_paid` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`provider_paid` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `provider_id` INT NOT NULL,
  `amount` FLOAT NOT NULL,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_provider_paid_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `zabuzachaule`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_provider_paid_provider1_idx` ON `zabuzachaule`.`provider_paid` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`category` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`season`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`season` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`season` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_time` DATE NOT NULL,
  `end_time` DATE NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`sex`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`sex` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`sex` (
  `id` INT NOT NULL,
  `name` VARCHAR(6) NOT NULL DEFAULT 'woman',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`brand` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`brand` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`product` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`product` (
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
    REFERENCES `zabuzachaule`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_season1`
    FOREIGN KEY (`season_id`)
    REFERENCES `zabuzachaule`.`season` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_sex1`
    FOREIGN KEY (`sex_id`)
    REFERENCES `zabuzachaule`.`sex` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_brand1`
    FOREIGN KEY (`brand_id`)
    REFERENCES `zabuzachaule`.`brand` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `code_UNIQUE` ON `zabuzachaule`.`product` (`code` ASC);

CREATE INDEX `fk_product_product_type1_idx` ON `zabuzachaule`.`product` (`category_id` ASC);

CREATE INDEX `fk_product_season1_idx` ON `zabuzachaule`.`product` (`season_id` ASC);

CREATE INDEX `fk_product_sex1_idx` ON `zabuzachaule`.`product` (`sex_id` ASC);

CREATE INDEX `fk_product_brand1_idx` ON `zabuzachaule`.`product` (`brand_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`product_import`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`product_import` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`product_import` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_code` VARCHAR(16) NOT NULL,
  `import_facture_code` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL,
  `import_price` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_product_import_product1`
    FOREIGN KEY (`product_code`)
    REFERENCES `zabuzachaule`.`product` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_import_import_facture1`
    FOREIGN KEY (`import_facture_code`)
    REFERENCES `zabuzachaule`.`import_facture` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_import_product1_idx` ON `zabuzachaule`.`product_import` (`product_code` ASC);

CREATE INDEX `fk_product_import_import_facture1_idx` ON `zabuzachaule`.`product_import` (`import_facture_code` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`config` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`config` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `value` VARCHAR(45) NOT NULL,
  `description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`fund`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`fund` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`fund` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`customer` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(12) NOT NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  `created_date` DATETIME NULL,
  `isboss` VARCHAR(1) NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`product_return`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`product_return` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`product_return` (
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
    REFERENCES `zabuzachaule`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_return_provider1_idx` ON `zabuzachaule`.`product_return` (`provider_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`customer_reservation_histo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`customer_reservation_histo` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`customer_reservation_histo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `amount` VARCHAR(45) NOT NULL DEFAULT 0,
  `status` VARCHAR(1) NOT NULL DEFAULT 'Y',
  `date` DATETIME NOT NULL,
  `complete_date` DATETIME NULL,
  `reserved_facture` VARCHAR(45) NULL,
  `complete_facture` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_customer_reservation_histo_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `zabuzachaule`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_customer_reservation_histo_customer1_idx` ON `zabuzachaule`.`customer_reservation_histo` (`customer_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`fund_change_histo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`fund_change_histo` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`fund_change_histo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fund_id` INT NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(245) NULL,
  `ratio` FLOAT NOT NULL DEFAULT 1,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_fund_change_histo_fund1`
    FOREIGN KEY (`fund_id`)
    REFERENCES `zabuzachaule`.`fund` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fund_change_histo_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_fund_change_histo_fund1_idx` ON `zabuzachaule`.`fund_change_histo` (`fund_id` ASC);

CREATE INDEX `fk_fund_change_histo_user1_idx` ON `zabuzachaule`.`fund_change_histo` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`spend_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`spend_category` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`spend_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`spend_for`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`spend_for` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`spend_for` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`spend_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`spend_type` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`spend_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`spend`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`spend` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`spend` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `spend_category_id` INT NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `user_id` INT NOT NULL,
  `description` VARCHAR(245) NULL,
  `date` DATETIME NULL,
  `spend_for_id` INT NOT NULL,
  `spend_type_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_spend_spend_category1`
    FOREIGN KEY (`spend_category_id`)
    REFERENCES `zabuzachaule`.`spend_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spend_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spend_spend_for1`
    FOREIGN KEY (`spend_for_id`)
    REFERENCES `zabuzachaule`.`spend_for` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_spend_spend_type1`
    FOREIGN KEY (`spend_type_id`)
    REFERENCES `zabuzachaule`.`spend_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_spend_spend_category1_idx` ON `zabuzachaule`.`spend` (`spend_category_id` ASC);

CREATE INDEX `fk_spend_user1_idx` ON `zabuzachaule`.`spend` (`user_id` ASC);

CREATE INDEX `fk_spend_spend_for1_idx` ON `zabuzachaule`.`spend` (`spend_for_id` ASC);

CREATE INDEX `fk_spend_spend_type1_idx` ON `zabuzachaule`.`spend` (`spend_type_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`product_deviation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`product_deviation` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`product_deviation` (
  `product_code` VARCHAR(16) NOT NULL,
  `quantity` FLOAT NOT NULL DEFAULT 0,
  `date` DATETIME NULL,
  `description` VARCHAR(245) NULL,
  CONSTRAINT `fk_product_deviation_product1`
    FOREIGN KEY (`product_code`)
    REFERENCES `zabuzachaule`.`product` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_product_deviation_product1_idx` ON `zabuzachaule`.`product_deviation` (`product_code` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`news` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(1000) NULL,
  `date` DATETIME NULL,
  `shop_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_news_shop1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zabuzachaule`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_news_shop1_idx` ON `zabuzachaule`.`news` (`shop_id` ASC);

CREATE INDEX `fk_news_user1_idx` ON `zabuzachaule`.`news` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`provider_paid_fund_change_histo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`provider_paid_fund_change_histo` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`provider_paid_fund_change_histo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fund_change_histo_id` INT NOT NULL,
  `provider_paid_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_provider_paid_fund_change_fund_change_histo1`
    FOREIGN KEY (`fund_change_histo_id`)
    REFERENCES `zabuzachaule`.`fund_change_histo` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_provider_paid_fund_change_provider_paid1`
    FOREIGN KEY (`provider_paid_id`)
    REFERENCES `zabuzachaule`.`provider_paid` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_provider_paid_fund_change_fund_change_histo1_idx` ON `zabuzachaule`.`provider_paid_fund_change_histo` (`fund_change_histo_id` ASC);

CREATE INDEX `fk_provider_paid_fund_change_provider_paid1_idx` ON `zabuzachaule`.`provider_paid_fund_change_histo` (`provider_paid_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`export_facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`export_facture` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`export_facture` (
  `code` VARCHAR(45) NOT NULL,
  `customer_id` INT NOT NULL,
  `shop_id` INT NOT NULL,
  `description` VARCHAR(1000) NULL,
  `date` DATETIME NOT NULL,
  `user_id` INT NOT NULL,
  `isonline` VARCHAR(1) NULL DEFAULT 'N',
  PRIMARY KEY (`code`),
  CONSTRAINT `fk_export_facture_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `zabuzachaule`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_export_facture_shop1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zabuzachaule`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_export_facture_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_export_facture_customer1_idx` ON `zabuzachaule`.`export_facture` (`customer_id` ASC);

CREATE INDEX `fk_export_facture_shop1_idx` ON `zabuzachaule`.`export_facture` (`shop_id` ASC);

CREATE INDEX `fk_export_facture_user1_idx` ON `zabuzachaule`.`export_facture` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`export_facture_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`export_facture_product` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`export_facture_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_code` VARCHAR(16) NOT NULL,
  `quantity` INT NOT NULL DEFAULT 0,
  `export_price` FLOAT NOT NULL DEFAULT 0,
  `export_facture_code` VARCHAR(45) NOT NULL,
  `re_qty` INT NOT NULL DEFAULT 0,
  `re_date` DATETIME NULL,
  `re_description` VARCHAR(245) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_export_facture_product_product1`
    FOREIGN KEY (`product_code`)
    REFERENCES `zabuzachaule`.`product` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_export_facture_product_export_facture1`
    FOREIGN KEY (`export_facture_code`)
    REFERENCES `zabuzachaule`.`export_facture` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_export_facture_product_product1_idx` ON `zabuzachaule`.`export_facture_product` (`product_code` ASC);

CREATE INDEX `fk_export_facture_product_export_facture1_idx` ON `zabuzachaule`.`export_facture_product` (`export_facture_code` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`export_facture_trace`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`export_facture_trace` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`export_facture_trace` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `export_facture_code` VARCHAR(45) NOT NULL,
  `total` FLOAT NOT NULL DEFAULT 0,
  `debt` FLOAT NOT NULL DEFAULT 0,
  `reserved` FLOAT NOT NULL DEFAULT 0,
  `order` FLOAT NOT NULL DEFAULT 0,
  `customer_give` FLOAT NOT NULL DEFAULT 0,
  `give_customer` FLOAT NOT NULL DEFAULT 0,
  `bonus_used` FLOAT NOT NULL DEFAULT 0,
  `return_amount` FLOAT NOT NULL DEFAULT 0,
  `shop_id` INT NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `customer_id` INT NOT NULL,
  `bonus_ratio` FLOAT NOT NULL DEFAULT 100,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_export_facture_trace_export_facture1`
    FOREIGN KEY (`export_facture_code`)
    REFERENCES `zabuzachaule`.`export_facture` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_export_facture_trace_shop1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zabuzachaule`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_export_facture_trace_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `zabuzachaule`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_export_facture_trace_export_facture1_idx` ON `zabuzachaule`.`export_facture_trace` (`export_facture_code` ASC);

CREATE INDEX `fk_export_facture_trace_shop1_idx` ON `zabuzachaule`.`export_facture_trace` (`shop_id` ASC);

CREATE INDEX `fk_export_facture_trace_customer1_idx` ON `zabuzachaule`.`export_facture_trace` (`customer_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`customer_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`customer_order` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`customer_order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_tel` VARCHAR(45) NOT NULL,
  `customer_name` VARCHAR(45) NULL,
  `product_code` VARCHAR(16) NULL,
  `color` VARCHAR(45) NOT NULL,
  `size` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL DEFAULT 1,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(255) NULL,
  `status` VARCHAR(1) NULL DEFAULT 'N',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`money_inout`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`money_inout` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`money_inout` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `shop_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_money_inout_shop1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zabuzachaule`.`shop` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_money_inout_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zabuzachaule`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_money_inout_shop1_idx` ON `zabuzachaule`.`money_inout` (`shop_id` ASC);

CREATE INDEX `fk_money_inout_user1_idx` ON `zabuzachaule`.`money_inout` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `zabuzachaule`.`inout_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`inout_type` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`inout_type` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`configuration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`configuration` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`configuration` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `value` VARCHAR(45) NOT NULL,
  `label` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`property` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`property` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `ket` FLOAT NULL DEFAULT 0,
  `loan` FLOAT NULL DEFAULT 0,
  `fund` FLOAT NULL DEFAULT 0,
  `store` FLOAT NULL DEFAULT 0,
  `debt` FLOAT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`user_absent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`user_absent` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`user_absent` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zabuzachaule`.`user_salary_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zabuzachaule`.`user_salary_table` ;

CREATE TABLE IF NOT EXISTS `zabuzachaule`.`user_salary_table` (
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`shop`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`shop` (`id`, `name`, `address`, `date`) VALUES (1, 'shop1', '19 Vạn Phúc - Hà Đông - Hà Nội', '2014-01-01 10:00:00');
INSERT INTO `zabuzachaule`.`shop` (`id`, `name`, `address`, `date`) VALUES (2, 'shop2', 'Số 3 Ngã Tư Lê Văn Lương - Vạn Phúc - Hà Đông - Hà Nội', '2014-01-01 10:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`, `salary_by_hour`) VALUES (1, 1, 'Trần Trí Duệ', 'trantridue@gmail.com', '0979355285', 'admin', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Ông chủ', NULL);
INSERT INTO `zabuzachaule`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`, `salary_by_hour`) VALUES (2, 2, 'Lê Thị Châu', 'zabuza.vn@gmail.com', '0966807709', 'chau', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Bà Chủ', NULL);
INSERT INTO `zabuzachaule`.`user` (`id`, `shop_id`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `status`, `start_date`, `end_date`, `description`, `salary_by_hour`) VALUES (3, 1, 'Lê Thị Bảo', 'baobao170491@gmail.com', '01649785255', 'bao', 'ea89fe25edf05960003a3b1ab4f4366e', 'y', 'y', '2014-01-01 10:00:00', '2020-12-31 22:00:00', 'Nhân Viên', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`role`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`role` (`id`, `name`, `description`) VALUES (1, 'admin', 'Quản Trị');
INSERT INTO `zabuzachaule`.`role` (`id`, `name`, `description`) VALUES (2, 'editor', 'Nhập Liệu');
INSERT INTO `zabuzachaule`.`role` (`id`, `name`, `description`) VALUES (3, 'employee', 'Nhân Viên');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`user_role`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (1, 1, NULL, 1);
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (2, 2, NULL, 2);
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (3, 3, NULL, 3);
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (4, 2, NULL, 1);
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (5, 3, NULL, 2);
INSERT INTO `zabuzachaule`.`user_role` (`id`, `role_id`, `description`, `user_id`) VALUES (6, 3, NULL, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`provider`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (1, 'Kiểm Hàng', '0979355285', '19 Vạn Phúc Hà Đông Hà Nội', 'Chủ cửa hàng', NULL);
INSERT INTO `zabuzachaule`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (2, 'Hiền', '0988774433', 'Đặng Văn Ngữ', 'Nhà cung cấp lớn', NULL);
INSERT INTO `zabuzachaule`.`provider` (`id`, `name`, `tel`, `address`, `description`, `date`) VALUES (3, 'Zamy', '0906223781', 'nghi tàm', 'Nhà cung cấp quan trọng', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`import_facture`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`import_facture` (`code`, `date`, `description`, `provider_id`, `deadline`, `link`) VALUES ('20150107_001', '2015-01-07 10:10:10', 'Test facture', 1, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`category`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`category` (`id`, `name`, `description`) VALUES (1, 'VAY', 'Các loại váy');
INSERT INTO `zabuzachaule`.`category` (`id`, `name`, `description`) VALUES (2, 'AO PHONG', 'Áo phông các loại');
INSERT INTO `zabuzachaule`.`category` (`id`, `name`, `description`) VALUES (3, 'QUAN JEANS', 'Các loại quần jeans');
INSERT INTO `zabuzachaule`.`category` (`id`, `name`, `description`) VALUES (4, 'CHAN VAY', 'Chân váy các loại');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`season`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (1, '2014-01-01', '2014-03-31', 'SPRING');
INSERT INTO `zabuzachaule`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (2, '2014-04-01', '2014-06-30', 'SUMMER');
INSERT INTO `zabuzachaule`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (3, '2014-07-01', '2014-09-30', 'AUTUMN');
INSERT INTO `zabuzachaule`.`season` (`id`, `start_time`, `end_time`, `name`) VALUES (4, '2014-10-01', '2014-12-31', 'WINTER');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`sex`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`sex` (`id`, `name`) VALUES (1, 'woman');
INSERT INTO `zabuzachaule`.`sex` (`id`, `name`) VALUES (2, 'man');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`brand`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`brand` (`id`, `name`) VALUES (1, 'MADEVN');
INSERT INTO `zabuzachaule`.`brand` (`id`, `name`) VALUES (2, 'F21');
INSERT INTO `zabuzachaule`.`brand` (`id`, `name`) VALUES (3, 'MGN');

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`product`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0001', 'Áo nam', 1, 1, 1, 1000, 'Helo', 1, 0, NULL);
INSERT INTO `zabuzachaule`.`product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0002', 'Quần jean', 2, 2, 2, 400, 'Tốt', 2, 0, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`product_import`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (1, '0001', '20150107_001', 10, 50);
INSERT INTO `zabuzachaule`.`product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (2, '0002', '20150107_001', 20, 200);

COMMIT;


-- -----------------------------------------------------
-- Data for table `zabuzachaule`.`customer`
-- -----------------------------------------------------
START TRANSACTION;
USE `zabuzachaule`;
INSERT INTO `zabuzachaule`.`customer` (`id`, `name`, `tel`, `description`, `date`, `created_date`, `isboss`) VALUES (1, 'Nhung HP', '0978663996', 'Thân', '2015-01-07 10:10:10', NULL, NULL);
INSERT INTO `zabuzachaule`.`customer` (`id`, `name`, `tel`, `description`, `date`, `created_date`, `isboss`) VALUES (2, 'Huong', '0978663993', 'Quen', '2015-01-07 10:11:11', NULL, NULL);

COMMIT;

