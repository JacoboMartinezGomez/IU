<?php
/*
 * Funcion del archivo: Archivo que cierra la sesion del usuario.
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
session_start();
session_destroy();
header('Location:../index.php');
?>
