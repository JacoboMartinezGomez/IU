<?php
/**
 * Archivo php donde se comprueba la autentificacion del usuario y redirige a donde sea conveniente en cada momento.
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();

}

?>
