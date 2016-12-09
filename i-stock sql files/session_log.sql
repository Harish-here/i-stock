CREATE TABLE `session_log` (
  `idsession_log` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`idsession_log`),
  UNIQUE KEY `idsession_log_UNIQUE` (`idsession_log`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;
