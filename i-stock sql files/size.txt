CREATE TABLE `size` (
  `idsize` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  PRIMARY KEY (`idsize`),
  UNIQUE KEY `idsize_UNIQUE` (`idsize`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
