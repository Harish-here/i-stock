CREATE TABLE `product_color` (
  `idproduct_color` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) NOT NULL,
  PRIMARY KEY (`idproduct_color`),
  UNIQUE KEY `idproduct_color_UNIQUE` (`idproduct_color`),
  UNIQUE KEY `color_UNIQUE` (`color`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
