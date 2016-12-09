CREATE TABLE `stockhistroy` (
  `idstockhistroy` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `product` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `stockbefore` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stockafter` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idstockhistroy`),
  UNIQUE KEY `idstockhistroy_UNIQUE` (`idstockhistroy`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
