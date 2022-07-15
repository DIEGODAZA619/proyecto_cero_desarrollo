DROP TABLE IF EXISTS ganancias_rangos;
CREATE TABLE ganancias_rangos
(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_usuario int,
  id_patrocinador int,
  id_factura int,
  id_plan int,
  valor_plan double,
  porcentaje int,
  ganancia_diaria double,
  tipo_ganancia int,
  correlativo int,
  correlativo_ganancia int,
  id_rangos varchar(100),
  fecha_calculo date ,
  fecha_registro datetime,
  fecha_recalculo datetime,
  estado_ganancia int default 1,
  PRIMARY KEY (id)
);

ALTER TABLE plano_carreira ADD COLUMN bono int;
update plano_carreira set bono = 0 where id = 1;
update plano_carreira set bono = 2 where id = 2;
update plano_carreira set bono = 3 where id = 3;
update plano_carreira set bono = 4 where id = 4;
update plano_carreira set bono = 5 where id = 5;
update plano_carreira set bono = 6 where id = 6;
update plano_carreira set bono = 7 where id = 7;
update plano_carreira set bono = 8 where id = 8;
update plano_carreira set bono = 9 where id = 9;
update plano_carreira set bono = 10 where id = 10;
update plano_carreira set bono = 1 where id = 11;