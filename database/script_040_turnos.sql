ALTER TABLE `turnos` ADD `email` VARCHAR(255) NULL ;
ALTER TABLE `valoraciones_servicio` CHANGE `turno_id` `turno_id` INT(11) NULL;


CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `comentario` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;