import mysql.connector
import csv
# Establecer la conexión con la base de datos
conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="DataDistritos"
)

# Crear un objeto cursor para ejecutar consultas SQL
cursor = conexion.cursor()

# Consulta SQL para insertar datos en la tabla
consulta = "INSERT INTO Datadistri  VALUES (NULL,%s, %s, %s)"

with open("C:/Users/JHON/Documents/GitHub/ProyectoFinalProgApli/BD/RESIDUOSSOLIDOS_EXT.csv") as f:
    reader = csv.reader(f,delimiter=";")
    distrito=1
    for i in reader:
        for j in range(2003,2022):
            año=j
            data=float(i[j-2002])
            # Datos a insertar
            datos = (distrito,año, data)
            # Ejecutar la consulta
            cursor.execute(consulta, datos)
            # Confirmar la transacción
            conexion.commit()
        distrito+=1
# Cerrar el cursor y la conexión
cursor.close()
conexion.close()