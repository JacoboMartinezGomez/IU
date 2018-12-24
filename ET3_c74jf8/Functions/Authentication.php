<?php
/*
 * Funcion del archivo: Comprobar que este autenticado el usuario.
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
function IsAuthenticated(){
	if (!isset($_SESSION['login'])){
		return false;
	}
	else{
		return true;
	}
} //end of function IsAuthenticated()
?>
