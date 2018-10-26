ALTER TABLE `detalle_pago` ADD `forma` INT(11) NULL ;
ALTER TABLE `detalle_pago` ADD `totalt` FLOAT NULL , ADD `totale` FLOAT NULL ;

ALTER TABLE `pagos` ADD `forma` INT(11) NULL ;
ALTER TABLE `pagos` ADD `totalt` FLOAT NULL , ADD `totale` FLOAT NULL ;