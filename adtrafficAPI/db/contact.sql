
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Name` VARCHAR(128) NOT NULL,
  `L_Name` VARCHAR(128) NOT NULL,
  `Email` VARCHAR(128) NOT NULL,
  `Phone` VARCHAR(128) NOT NULL,
  `Company` VARCHAR(128) NOT NULL,
  `SkypeorTelegram` VARCHAR(128) NOT NULL,
  `Message` MEDIUMTEXT NOT NULL,
  `CreatedAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);