ALTER TABLE `turnos` ADD `fecha_hora_inicio` DATETIME NULL , ADD `fecha_hora_final` DATETIME NULL ;

ALTER TABLE `servicios` ADD `intervalo` INT(11) NULL ;

UPDATE `servicios` set intervalo = 0;
ALTER TABLE `turnos` ADD `mostrar` INT(11) NULL DEFAULT '0' ;