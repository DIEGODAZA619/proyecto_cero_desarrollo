para los roles de usuario ejecutar el script

script_2022-07-10.sql


SUBIR LOS SIGUIENTES ARCHIVOS 

application\config\routes.php
controlador
application\controllers\admin\Rangos.php
application\controllers\admin\Dashboard.php
application\controllers\admin\Usuarios.php    linea 79

helpers
application\helpers\rangos_helper.php			
application\helpers\usuarios_helper.php       linea 403 en adelante

modelo
application\models\admin\Contamodel.php	      linea 36
application\models\admin\Faturasmodel.php	  liena 273 al 279
application\models\admin\Rangomodel.php
application\models\admin\Usuariosmodel.php	  linea 190 en adelante
application\models\cliente\Faturasmodel.php   linea 309 al 317
application\models\Cronmodel.php			  linea 142 al 150   203 al 209
application\models\admin\Addplanmodel.php     linea 59

vista
application\views\admin\addplan
application\views\admin\rangos
application\views\admin\usuarios\editar.php
application\views\admin\usuarios\visualizar.php
application\views\cliente\backoffice\backoffice.php


js
assets\pages\admin\rangos.js
assets\pages\cliente\saque.js

-----------------------------------



