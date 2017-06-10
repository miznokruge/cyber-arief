SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `arief_tugas_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `arief_tugas_1` ;

-- -----------------------------------------------------
-- Table `arief_tugas_1`.`table1`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`table1` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arief_tugas_1`.`customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NULL ,
  `address` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arief_tugas_1`.`goods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`goods` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `price` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arief_tugas_1`.`sales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`sales` (
  `id` INT NOT NULL ,
  `no` VARCHAR(45) NULL ,
  `date` VARCHAR(45) NULL ,
  `customer_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sales_customer` (`customer_id` ASC) ,
  CONSTRAINT `fk_sales_customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `arief_tugas_1`.`customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arief_tugas_1`.`sales_detail`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`sales_detail` (
  `id` INT(11) NOT NULL ,
  `sales_id` INT NOT NULL ,
  `barang_id` INT NOT NULL ,
  `qty` VARCHAR(45) NULL ,
  `price` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sales_has_barang_barang1` (`barang_id` ASC) ,
  INDEX `fk_sales_has_barang_sales1` (`sales_id` ASC) ,
  CONSTRAINT `fk_sales_has_barang_sales1`
    FOREIGN KEY (`sales_id` )
    REFERENCES `arief_tugas_1`.`sales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sales_has_barang_barang1`
    FOREIGN KEY (`barang_id` )
    REFERENCES `arief_tugas_1`.`goods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arief_tugas_1`.`payments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `arief_tugas_1`.`payments` (
  `id` INT NOT NULL ,
  `type` VARCHAR(45) NULL ,
  `amount` INT NULL ,
  `sales_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_payments_sales1` (`sales_id` ASC) ,
  CONSTRAINT `fk_payments_sales1`
    FOREIGN KEY (`sales_id` )
    REFERENCES `arief_tugas_1`.`sales` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
