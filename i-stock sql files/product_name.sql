CREATE TABLE `product_name` (
  `idproduct_name` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idproduct_name`),
  UNIQUE KEY `idproduct_name_UNIQUE` (`idproduct_name`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
