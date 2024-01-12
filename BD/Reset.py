import mysql.connector

# Establecer la conexión con el servidor MySQL
conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password=""
)

# Crear un objeto cursor para ejecutar comandos SQL
cursor = conexion.cursor()

# Nombre de la base de datos
nombre_base_datos = "DataDistritos"

# Consulta SQL para verificar la existencia de la base de datos
consulta = f"SHOW DATABASES LIKE '{nombre_base_datos}'"

# Ejecutar la consulta
cursor.execute(consulta)

# Obtener resultados
resultados = cursor.fetchall()

# Verificar si la base de datos existe
if resultados:
    # La base de datos ya existe entonces se borra
    consulta = f"DROP DATABASE {nombre_base_datos}"
    cursor.execute(consulta)

# Crear la base de datos
consulta = "CREATE DATABASE DataDistritos;"
cursor.execute(consulta)

# Seleccionar la base de datos
consulta = "USE DataDistritos"
cursor.execute(consulta)

# Crear la tabla Distritos e insertar datos
consulta = """create table Distritos
( coddistri  int ,
  distrito  varchar(50),
  PRIMARY  key(coddistri)
)"""
cursor.execute(consulta)

distritos = [
    (1,'Ancon'),
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
(43,'Villa María del Triunfo')
]

consulta = "insert into Distritos values(%s, %s)"
cursor.executemany(consulta, distritos)

# Crear las otras tablas
consulta = """create table prediccion(
    cod int not null AUTO_INCREMENT,
    codususario int,
    coddatadistri int,
    coddataclasificador int,
    PRIMARY key (cod)
)"""
cursor.execute(consulta)

consulta = """create table dataclasificador(
    coddata int not null AUTO_INCREMENT,
    prediccion varchar(50),
    textiles float,
    electronicos float,
    vidrios float,
    metales float,
    cartonypapel float,
    plastico float,
    PRIMARY key (coddata)
)"""
cursor.execute(consulta)

consulta = """create table  Datadistri
(  coddata int,
   coddistri int,
   years int,
   Prediccion float,
   PRIMARY  key(coddata)
)"""
cursor.execute(consulta)

consulta = "ALTER TABLE Datadistri  MODIFY COLUMN coddata INT NOT NULL AUTO_INCREMENT;"
cursor.execute(consulta)
consulta = "ALTER TABLE  Datadistri ADD FOREIGN KEY (coddistri) REFERENCES Distritos(coddistri);"
cursor.execute(consulta)

consulta = """create table usuarios(
    codusu int not null AUTO_INCREMENT,
    nombre varchar(60),
    apellido varchar(60),
    correo varchar(80),
    pass varchar(8),
    sesion int,
    PRIMARY key(codusu)
)"""
cursor.execute(consulta)

consulta = "alter table  prediccion ADD FOREIGN KEY (coddatadistri) REFERENCES Datadistri(coddata);"
cursor.execute(consulta)
consulta = "alter table  prediccion ADD FOREIGN KEY (coddataclasificador) REFERENCES dataclasificador(coddata);"
cursor.execute(consulta)
consulta = "alter table  prediccion ADD FOREIGN KEY (codususario) REFERENCES usuarios(codusu);"
cursor.execute(consulta)

# Confirmar la transacción
conexion.commit()

# Cerrar el cursor y la conexión
cursor.close()
conexion.close()
