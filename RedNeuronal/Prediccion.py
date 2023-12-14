import tensorflow as tf
import sys

year =sys.argv[1]
distrito=sys.argv[2]

Modelo = tf.keras.models.load_model('C:/Users/JHON/Documents/GitHub/ProyectoFinalProgApli/RedNeuronal/ModelosDistritos/distrito{}.h5'.format(distrito))#colocar la direcion de la carpeta donde se ubican los modelos entrenados
prediccion = Modelo.predict([int(year)],verbose=False)
print(prediccion[0][0])