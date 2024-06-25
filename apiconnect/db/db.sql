--
-- Table structure for table `register`
--
CREATE TABLE IF NOT EXISTS `apiconnect` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `msisdn` VARCHAR(128) NOT NULL,
  `transaction_id` VARCHAR(128) NULL DEFAULT NULL,
  `statustr` VARCHAR(128) NOT NULL,
  `UpdatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);