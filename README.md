# ciudadenlinea
Prueba tecnica ciudadenlinea

El sitio Web está hecho en PHP con el framework codeigniter.

Se deberá descargar o clonar el proyecto y realizar los siguientes pasos:

1. Modificar el archivo config.php de la carpeta application cambiando el valor 
   de la variable "$config['base_url']" segun el servidor. Por ejemplo en un 
   ambiente local sería: $config['base_url'] = 'http://localhost/ciudadenlinea/';

2. Modificar el archivo database.php de la carpeta application cambiando el valor
   de la variable "$db['default']". Esta variable es un vector asociativo, en el
   cual se definen los parámetros necesarios para conectarse a la base de datos.
   Por defecto la base de datos se llama "formul".

3. Ejecutar el script de base de datos que se encuentra ubicado en la carpeta SQL
   con el nombre "esquema.sql".

NOTA: se debe verificar que el apache permita utilizar las directivas de los
      archivos .htaccess

Para acceder a la demo del sitio: http://formul.brinkster.net/ciudadenlinea/