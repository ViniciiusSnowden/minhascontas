ALTER TABLE `contas` 
ADD INDEX `removido` (`removido` ASC) INVISIBLE,
ADD INDEX `id_usuario` (`id_usuario` ASC) VISIBLE;
;