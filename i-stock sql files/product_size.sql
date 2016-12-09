CREATE TABLE `product_size` (
  `idproduct_size` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(45) NOT NULL,
  PRIMARY KEY (`idproduct_size`),
  UNIQUE KEY `idproduct_size_UNIQUE` (`idproduct_size`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
