CREATE TABLE `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT 'Sem nome',
  `usuario` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL,
  `senha` VARCHAR(255) NULL,
  `data_cadastro` DATETIME NULL,
  PRIMARY KEY (`id`));