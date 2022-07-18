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
  nivel_ganancia int default 0,
  ganancia_diaria double,
  tipo_ganancia int,
  correlativo int,
  correlativo_ganancia int,
  id_rangos varchar(100),
  fecha_calculo date ,
  fecha_registro datetime,
  fecha_recalculo datetime,  
  fecha_pago datetime,
  estado_ganancia int default 1,
  PRIMARY KEY (id)
);


ALTER TABLE plano_carreira ADD COLUMN bono int;
ALTER TABLE plano_carreira ADD COLUMN requesitos int default 0;
ALTER TABLE plano_carreira ADD COLUMN requesitos_planes int default 0; 

update plano_carreira set bono = 0, requesitos_planes = 0 where id = 1;
update plano_carreira set bono = 2, requesitos_planes = 0 where id = 2;
update plano_carreira set bono = 3, requesitos_planes = 0 where id = 3;
update plano_carreira set bono = 4, requesitos_planes = 0 where id = 4;
update plano_carreira set bono = 5, requesitos_planes = 0 where id = 5;
update plano_carreira set bono = 6, requesitos = 1, requesitos_planes = 3 where id = 6;
update plano_carreira set bono = 7, requesitos = 1, requesitos_planes = 4 where id = 7;
update plano_carreira set bono = 8, requesitos = 1, requesitos_planes = 5 where id = 8;
update plano_carreira set bono = 9, requesitos = 1, requesitos_planes = 6 where id = 9;
update plano_carreira set bono = 10, requesitos = 1, requesitos_planes = 7 where id = 10;
update plano_carreira set bono = 1, requesitos_planes = 0 where id = 11;


INSERT INTO opciones(id,id_modulo, codigo_opciones, opcion, link, icono, nivel, orden, estado) 
VALUES (25,0,13,'Qualified binary','admin/qualified-binary','',2,6,'AC');


INSERT INTO usuarios_opciones(id_opcion, id_usuario) 
VALUES (25,1);


ALTER TABLE extrato ADD COLUMN id_ganancia_rango int default 0;


