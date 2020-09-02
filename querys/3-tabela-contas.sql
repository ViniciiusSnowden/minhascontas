CREATE TABLE `contas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NULL,
  `valor` DECIMAL(15,2) NULL,
  `data_vencimento` DATE NULL,
  `status` INT(5) NULL DEFAULT 0,
  `recorrente` INT(5) NULL DEFAULT 0,
  `removido` VARCHAR(5) NULL DEFAULT 'N',
  `id_usuario` INT NULL,
  PRIMARY KEY (`id`));
