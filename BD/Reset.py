import mysql.connector

# Establecer la conexión con el servidor MySQL
conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password=""
)

# Crear un objeto cursor para ejecutar comandos SQL
cursor = conexion.cursor()

# Nombre de la base de datos que deseas verificar
nombre_base_datos = "DataDistritos"

# Consulta SQL para verificar la existencia de la base de datos
consulta = f"SHOW DATABASES LIKE '{nombre_base_datos}'"

# Ejecutar la consulta
cursor.execute(consulta)

# Obtener resultados
resultados = cursor.fetchall()

# Verificar si la base de datos existe
if resultados:
    consulta = "DROP DATABASE DataDistritos"
    cursor.execute(consulta)
    consulta = "CREATE DATABASE  DataDistritos;"
    cursor.execute(consulta)
    consulta = "USE DataDistritos"
    cursor.execute(consulta)
    consulta = "create table Distritos( coddistri  int ,distrito  varchar(50),PRIMARY  key(coddistri));"
    cursor.execute(consulta)
    consulta="""insert into Distritos values(1,'Ancon'),
(2,'Ate'),
(3,'Barranco'),
(4,'Breña'),
(5,'Carabayllo'),
(6,'Chaclacayo'),
(7,'Chorrillos'),
(8,'Cieneguilla'),
(9,'Comas'),
(10,'El Agustino'),
(11,'Independencia'),
(12,' Jesús María'),
(13,'La Molina'),
(14,'La Victoria'),
(15,'Lima'),
(16,'Lince'),
(17,'Los Olivos'),
(18,'Lurigancho'),
(19,'Lurín'),
(20,'Magdalena del Mar'),
(21,'Miraflores'),
(22,'Pachacamac'),
(23,'Pucusana'),
(24,'Pueblo Libre'),
(25,'Puente Piedra'),
(26,'Punta Hermosa'),
(27,'Punta Negra'),
(28,'Rimac'),
(29,'San Bartolo'),
(30,'San Borja'),
(31,'San Isidro'),
(32,'San Juan de Lurigancho'),
(33,'San Juan de Miraflores'),
(34,'San Luis'),
(35,'San Martín de Porres'),
(36,'San Miguel'),
(37,'Santa Anita'),
(38,'Santa María del Mar'),
(39,'Santa Rosa'),
(40,'Santiago de Surco'),
(41,'Surquillo'),
(42,'Villa El Salvador'),
(43,'Villa María del Triunfo');"""
    cursor.execute(consulta)
    consulta = """create table  Datadistri
(  coddata int,
   coddistri int,
   years int,
   Prediccion float,
   PRIMARY  key(coddata)
);"""
    cursor.execute(consulta)

    consulta = "ALTER TABLE Datadistri  MODIFY COLUMN coddata INT NOT NULL AUTO_INCREMENT;"
    cursor.execute(consulta)
    consulta = "ALTER TABLE  Datadistri ADD FOREIGN KEY (coddistri) REFERENCES Distritos(coddistri);"
    cursor.execute(consulta)
    consulta = "create table usuarios(codusu int not null AUTO_INCREMENT,nombre varchar(60),apellido varchar(60),correo varchar(80),pass varchar(8),sesion int,PRIMARY key(codusu))"
    cursor.execute(consulta)

else:
    consulta = "CREATE DATABASE  DataDistritos;"
    cursor.execute(consulta)
    consulta = "USE DataDistritos"
    cursor.execute(consulta)
    consulta = "create table Distritos( coddistri  int ,distrito  varchar(50),PRIMARY  key(coddistri));"
    cursor.execute(consulta)
    consulta="""insert into Distritos values(1,'Ancon'),
(2,'Ate'),
(3,'Barranco'),
(4,'Breña'),
(5,'Carabayllo'),
(6,'Chaclacayo'),
(7,'Chorrillos'),
(8,'Cieneguilla'),
(9,'Comas'),
(10,'El Agustino'),
(11,'Independencia'),
(12,' Jesús María'),
(13,'La Molina'),
(14,'La Victoria'),
(15,'Lima'),
(16,'Lince'),
(17,'Los Olivos'),
(18,'Lurigancho'),
(19,'Lurín'),
(20,'Magdalena del Mar'),
(21,'Miraflores'),
(22,'Pachacamac'),
(23,'Pucusana'),
(24,'Pueblo Libre'),
(25,'Puente Piedra'),
(26,'Punta Hermosa'),
(27,'Punta Negra'),
(28,'Rimac'),
(29,'San Bartolo'),
(30,'San Borja'),
(31,'San Isidro'),
(32,'San Juan de Lurigancho'),
(33,'San Juan de Miraflores'),
(34,'San Luis'),
(35,'San Martín de Porres'),
(36,'San Miguel'),
(37,'Santa Anita'),
(38,'Santa María del Mar'),
(39,'Santa Rosa'),
(40,'Santiago de Surco'),
(41,'Surquillo'),
(42,'Villa El Salvador'),
(43,'Villa María del Triunfo');"""
    cursor.execute(consulta)
    consulta = """create table  Datadistri
(  coddata int,
   coddistri int,
   years int,
   Prediccion float,
   PRIMARY  key(coddata)
);"""
    cursor.execute(consulta)

    consulta = "ALTER TABLE Datadistri  MODIFY COLUMN coddata INT NOT NULL AUTO_INCREMENT;"
    cursor.execute(consulta)
    consulta = "ALTER TABLE  Datadistri ADD FOREIGN KEY (coddistri) REFERENCES Distritos(coddistri);"
    cursor.execute(consulta)

    consulta = "create table usuarios(codusu int not null AUTO_INCREMENT,nombre varchar(60),apellido varchar(60),correo varchar(80),pass varchar(8),sesion int,PRIMARY key(codusu))"
    cursor.execute(consulta)

# Cerrar el cursor y la conexión
cursor.close()
conexion.close()
