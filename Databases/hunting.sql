-- MySQL Script generated by MySQL Workbench
-- 12/02/14 15:53:45
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ryans299_hunt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ryans299_hunt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ryans299_hunt` DEFAULT CHARACTER SET utf8 ;
USE `ryans299_hunt` ;

-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Monster`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Monster` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `breakable_parts` VARCHAR(45) NULL,
  `carves` VARCHAR(45) NULL,
  `alive` TINYINT(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Area` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `monster` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Quests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Quests` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `reward` VARCHAR(45) NULL,
  `finished` TINYINT(1) NULL,
  `Monster_id` INT NOT NULL,
  `Area_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Monster_id`, `Area_id`),
  INDEX `fk_Quests_Monster1_idx` (`Monster_id` ASC),
  INDEX `fk_Quests_Area1_idx` (`Area_id` ASC),
  CONSTRAINT `fk_Quests_Monster1`
    FOREIGN KEY (`Monster_id`)
    REFERENCES `ryans299_hunt`.`Monster` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Quests_Area1`
    FOREIGN KEY (`Area_id`)
    REFERENCES `ryans299_hunt`.`Area` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Breakable_parts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Breakable_parts` (
  `id` INT NOT NULL,
  `body_part` VARCHAR(45) NOT NULL,
  `Monster_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Breakable_parts_Monster1_idx` (`Monster_id` ASC),
  CONSTRAINT `fk_Breakable_parts_Monster1`
    FOREIGN KEY (`Monster_id`)
    REFERENCES `ryans299_hunt`.`Monster` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = ascii;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Carves`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Carves` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `rarity` VARCHAR(45) NOT NULL,
  `Monster_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Monster_id`),
  INDEX `fk_Carves_Monster1_idx` (`Monster_id` ASC),
  CONSTRAINT `fk_Carves_Monster1`
    FOREIGN KEY (`Monster_id`)
    REFERENCES `ryans299_hunt`.`Monster` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Weapon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Weapon` (
  `name` VARCHAR(45) NOT NULL,
  `class` VARCHAR(45) NULL,
  `damage` VARCHAR(45) NULL,
  `sharpness` VARCHAR(45) NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Recipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Recipe` (
  `id` INT NOT NULL,
  `material 1` VARCHAR(45) NOT NULL,
  `material 2` VARCHAR(45) NOT NULL,
  `material 3` VARCHAR(45) NOT NULL,
  `Weapon_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `Weapon_name`),
  INDEX `fk_Recipe_Weapon1_idx` (`Weapon_name` ASC),
  CONSTRAINT `fk_Recipe_Weapon1`
    FOREIGN KEY (`Weapon_name`)
    REFERENCES `ryans299_hunt`.`Weapon` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Area_has_Monster`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Area_has_Monster` (
  `Area_id` INT NOT NULL,
  `Monster_id` INT NOT NULL,
  INDEX `fk_Area_has_Monster_Area1_idx` (`Area_id` ASC),
  PRIMARY KEY (`Monster_id`),
  CONSTRAINT `fk_Area_has_Monster_Area1`
    FOREIGN KEY (`Area_id`)
    REFERENCES `ryans299_hunt`.`Area` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Area_has_Monster_Monster1`
    FOREIGN KEY (`Monster_id`)
    REFERENCES `ryans299_hunt`.`Monster` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ryans299_hunt`.`Rewards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ryans299_hunt`.`Rewards` (
  `idRewards` INT NOT NULL,
  `material` VARCHAR(255) NULL,
  `Breakable_parts_id` INT NOT NULL,
  `Carves_id` INT NOT NULL,
  `Carves_Monster_id` INT NOT NULL,
  PRIMARY KEY (`idRewards`, `Breakable_parts_id`, `Carves_id`, `Carves_Monster_id`),
  INDEX `fk_Rewards_Breakable_parts1_idx` (`Breakable_parts_id` ASC),
  INDEX `fk_Rewards_Carves1_idx` (`Carves_id` ASC, `Carves_Monster_id` ASC),
  CONSTRAINT `fk_Rewards_Breakable_parts1`
    FOREIGN KEY (`Breakable_parts_id`)
    REFERENCES `ryans299_hunt`.`Breakable_parts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rewards_Carves1`
    FOREIGN KEY (`Carves_id` , `Carves_Monster_id`)
    REFERENCES `ryans299_hunt`.`Carves` (`id` , `Monster_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
