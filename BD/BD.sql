CREATE DATABASE  DataDistritos;
USE DataDistritos;
create table Distritos
( coddistri  int ,
  distrito  varchar(50),
  PRIMARY  key(coddistri)
);
insert into Distritos values(1,'Ancon');
insert into Distritos values(2,'Ate');
insert into Distritos values(3,'Barranco');
insert into Distritos values(4,'Breña');
insert into Distritos values(5,'Carabayllo');
insert into Distritos values(6,'Chaclacayo');
insert into Distritos values(7,'Chorrillos');
insert into Distritos values(8,'Cieneguilla');
insert into Distritos values(9,'Comas');
insert into Distritos values(10,'El Agustino');
insert into Distritos values(11,'Independencia');
insert into Distritos values(12,' Jesús María');
insert into Distritos values(13,'La Molina');
insert into Distritos values(14,'La Victoria');
insert into Distritos values(15,'Lima');
insert into Distritos values(16,'Lince');
insert into Distritos values(17,'Los Olivos');
insert into Distritos values(18,'Lurigancho');
insert into Distritos values(19,'Lurín');
insert into Distritos values(20,'Magdalena del Mar');
insert into Distritos values(21,'Miraflores');
insert into Distritos values(22,'Pachacamac');
insert into Distritos values(23,'Pucusana');
insert into Distritos values(24,'Pueblo Libre');
insert into Distritos values(25,'Puente Piedra');
insert into Distritos values(26,'Punta Hermosa');
insert into Distritos values(27,'Punta Negra');
insert into Distritos values(28,'Rimac');
insert into Distritos values(29,'San Bartolo');
insert into Distritos values(30,'San Borja');
insert into Distritos values(31,'San Isidro');
insert into Distritos values(32,'San Juan de Lurigancho');
insert into Distritos values(33,'San Juan de Miraflores');
insert into Distritos values(34,'San Luis');
insert into Distritos values(35,'San Martín de Porres');
insert into Distritos values(36,'San Miguel');
insert into Distritos values(37,'Santa Anita');
insert into Distritos values(38,'Santa María del Mar');
insert into Distritos values(39,'Santa Rosa');
insert into Distritos values(40,'Santiago de Surco');
insert into Distritos values(41,'Surquillo');
insert into Distritos values(42,'Villa El Salvador');
insert into Distritos values(43,'Villa María del Triunfo');



create table  Datadistri
(  coddata int,
   coddistri int,
   years int,
   Prediccion float,
   PRIMARY  key(coddata)
);
ALTER TABLE Datadistri  MODIFY COLUMN coddata INT NOT NULL AUTO_INCREMENT;
alter table  Datadistri ADD FOREIGN KEY (coddistri) REFERENCES Distritos(coddistri);

insert into Datadistri values(NULL,1,2023,74564.5);
insert into Datadistri values(NULL,1,2024,74584.5);
insert into Datadistri values(NULL,1,2025,74594.5);
insert into Datadistri values(NULL,1,2026,74664.5);
insert into Datadistri values(NULL,1,2027,74764.5);
insert into Datadistri values(NULL,1,2028,74964.5);
insert into Datadistri values(NULL,1,2029,76564.5);
insert into Datadistri values(NULL,2,2023,74564.5);
insert into Datadistri values(NULL,2,2024,74584.5);
insert into Datadistri values(NULL,2,2025,74594.5);
insert into Datadistri values(NULL,2,2026,74664.5);
insert into Datadistri values(NULL,2,2027,74764.5);
insert into Datadistri values(NULL,2,2028,74964.5);
insert into Datadistri values(NULL,2,2029,76564.5);
insert into Datadistri values(NULL,3,2023,74564.5);
insert into Datadistri values(NULL,3,2024,74584.5);
insert into Datadistri values(NULL,3,2025,74594.5);
insert into Datadistri values(NULL,3,2026,74664.5);
insert into Datadistri values(NULL,3,2027,74764.5);
insert into Datadistri values(NULL,3,2028,74964.5);
insert into Datadistri values(NULL,3,2029,76564.5);
insert into Datadistri values(NULL,4,2023,74564.5);
insert into Datadistri values(NULL,4,2024,74584.5);
insert into Datadistri values(NULL,4,2025,74594.5);
insert into Datadistri values(NULL,4,2026,74664.5);
insert into Datadistri values(NULL,4,2027,74764.5);
insert into Datadistri values(NULL,4,2028,74964.5);
insert into Datadistri values(NULL,4,2029,76564.5);
insert into Datadistri values(NULL,5,2023,7564.5);
insert into Datadistri values(NULL,5,2024,7484.5);
insert into Datadistri values(NULL,5,2025,7494.5);
insert into Datadistri values(NULL,5,2026,7464.5);
insert into Datadistri values(NULL,5,2027,7764.5);
insert into Datadistri values(NULL,5,2028,7964.5);
insert into Datadistri values(NULL,5,2029,7664.5);