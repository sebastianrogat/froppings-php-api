CREATE TABLE IF NOT EXISTS `FROPPINGS`.`Usuarios` (
  `Cedula` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Apellido` VARCHAR(45) NULL,
  `Direccion` VARCHAR(345) NULL,
  `Telefono` VARCHAR(45) NULL,
  `Puntos` INT NULL,
  `TipoUsuario_idTipoUsuario` INT NOT NULL,
  PRIMARY KEY (`Cedula`),
  INDEX `fk_Usuarios_TipoUsuario_idx` (`TipoUsuario_idTipoUsuario` ASC),
  CONSTRAINT `fk_Usuarios_TipoUsuario`
    FOREIGN KEY (`TipoUsuario_idTipoUsuario`)
    REFERENCES `FROPPINGS`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB