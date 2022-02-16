CREATE DATABASE IF NOT EXISTS `doctolib` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `doctolib`;

-- Listage de la structure de la table doctolib. doctors
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(50) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(5) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `phone` CHAR(10) NOT NULL,
  `phone2` CHAR(10) 
    DEFAULT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `spec_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)  
);


CREATE TABLE IF NOT EXISTS `patients` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(50) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `zipcode` CHAR(5) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `phone` CHAR(10) NOT NULL,
  `phone2` CHAR(10) DEFAULT NULL,
  `mail` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)  
);

CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `doctor_id` INT(11) NOT NULL,
  `patient_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `consult_rate` FLOAT NOT NULL,
  `created_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)  
);

CREATE TABLE IF NOT EXISTS `patients_doctors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `patient_id` INT(11) NOT NULL,
  `doctor_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL 
    DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)  
);

ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_doctor_speciality_id`
  FOREIGN KEY (`spec_id`)
  REFERENCES `speciality` (`id`);

ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_rdv_doctor_id`
  FOREIGN KEY (`doctor_id`)
  REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `fk_rdv_patient_id`
  FOREIGN KEY (`patient_id`)
  REFERENCES `patients`(`id`);

ALTER TABLE `patients_doctors`
  ADD CONSTRAINT `fk_patients_doctor`
  FOREIGN KEY (`patient_id`)
  REFERENCES `patients`(`id`),
  ADD CONSTRAINT `fk_doctors_patient`
  FOREIGN KEY (`doctor_id`)
  REFERENCES `doctors`(`id`);