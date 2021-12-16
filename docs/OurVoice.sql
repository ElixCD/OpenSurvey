/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `ourvoice`;
CREATE DATABASE IF NOT EXISTS `ourvoice` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ourvoice`;

DROP TABLE IF EXISTS `factors`;
CREATE TABLE IF NOT EXISTS `factors` (
  `idfactor` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `users_iduser` int(11) NOT NULL,
  PRIMARY KEY (`idfactor`),
  KEY `fk_factor_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_factor_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `idmodule` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idmodule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `module_access`;
CREATE TABLE IF NOT EXISTS `module_access` (
  `idmodule_access` int(11) NOT NULL AUTO_INCREMENT,
  `user_types_iduser_type` int(11) NOT NULL,
  `modules_idmodule` int(11) NOT NULL,
  `permissions_idpermission` int(11) NOT NULL,
  PRIMARY KEY (`idmodule_access`),
  KEY `fk_module_access_user_types1_idx` (`user_types_iduser_type`),
  KEY `fk_module_access_modules1_idx` (`modules_idmodule`),
  KEY `fk_module_access_permissions1_idx` (`permissions_idpermission`),
  CONSTRAINT `fk_module_access_modules1` FOREIGN KEY (`modules_idmodule`) REFERENCES `modules` (`idmodule`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_module_access_permissions1` FOREIGN KEY (`permissions_idpermission`) REFERENCES `permissions` (`idpermission`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_module_access_user_types1` FOREIGN KEY (`user_types_iduser_type`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `idpermission` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idpermission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `idquestion` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  `mandatory` binary(1) NOT NULL,
  `factors_idfactor` int(11) NOT NULL,
  `surveys_idsurvey` int(11) NOT NULL,
  PRIMARY KEY (`idquestion`),
  KEY `fk_questions_factor1_idx` (`factors_idfactor`),
  KEY `fk_questions_survey1_idx` (`surveys_idsurvey`),
  CONSTRAINT `fk_questions_factor1` FOREIGN KEY (`factors_idfactor`) REFERENCES `factors` (`idfactor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_survey1` FOREIGN KEY (`surveys_idsurvey`) REFERENCES `surveys` (`idsurvey`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `responses`;
CREATE TABLE IF NOT EXISTS `responses` (
  `idresponse` int(11) NOT NULL AUTO_INCREMENT,
  `response` int(11) NOT NULL,
  `questions_idquestion` int(11) NOT NULL,
  PRIMARY KEY (`idresponse`),
  KEY `fk_response_questions1_idx` (`questions_idquestion`),
  CONSTRAINT `fk_response_questions1` FOREIGN KEY (`questions_idquestion`) REFERENCES `questions` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `rubrics`;
CREATE TABLE IF NOT EXISTS `rubrics` (
  `idrubric` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `value` int(11) NOT NULL,
  `factors_idfactor` int(11) NOT NULL,
  PRIMARY KEY (`idrubric`),
  KEY `fk_rubric_factor1_idx` (`factors_idfactor`),
  CONSTRAINT `fk_rubric_factor1` FOREIGN KEY (`factors_idfactor`) REFERENCES `factors` (`idfactor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `surveys`;
CREATE TABLE IF NOT EXISTS `surveys` (
  `idsurvey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` binary(1) NOT NULL,
  PRIMARY KEY (`idsurvey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` binary(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `register_date` datetime NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_relations`;
CREATE TABLE IF NOT EXISTS `user_relations` (
  `iduser_relations` int(11) NOT NULL AUTO_INCREMENT,
  `users_iduser_admin` int(11) NOT NULL,
  `users_iduser_user` int(11) NOT NULL,
  PRIMARY KEY (`iduser_relations`),
  KEY `fk_user_relations_users1_idx` (`users_iduser_admin`),
  KEY `fk_user_relations_users2_idx` (`users_iduser_user`),
  CONSTRAINT `fk_user_relations_users_admin` FOREIGN KEY (`users_iduser_admin`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_relations_users_user` FOREIGN KEY (`users_iduser_user`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `iduser_rol` int(11) NOT NULL AUTO_INCREMENT,
  `users_iduser` int(11) NOT NULL,
  `roles_idrol` int(11) NOT NULL,
  PRIMARY KEY (`iduser_rol`),
  KEY `fk_user_rol_users1_idx` (`users_iduser`),
  KEY `fk_user_rol_roles1_idx` (`roles_idrol`),
  CONSTRAINT `fk_user_rol_roles1` FOREIGN KEY (`roles_idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_rol_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_surveys`;
CREATE TABLE IF NOT EXISTS `user_surveys` (
  `iduser_survey` int(11) NOT NULL AUTO_INCREMENT,
  `users_iduser` int(11) NOT NULL,
  `surveys_idsurvey` int(11) NOT NULL,
  `propietary` binary(1) NOT NULL,
  `complete` binary(1) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser_survey`),
  KEY `fk_user_survey_users1_idx` (`users_iduser`),
  KEY `fk_user_survey_survey1_idx` (`surveys_idsurvey`),
  CONSTRAINT `fk_user_survey_survey1` FOREIGN KEY (`surveys_idsurvey`) REFERENCES `surveys` (`idsurvey`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_survey_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
