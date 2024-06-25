
CREATE TABLE IF NOT EXISTS `cookie`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `referrer_url` varchar(255) DEFAULT NULL,
 `user_ip_address` varchar(50) NOT NULL,
 `created` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
);