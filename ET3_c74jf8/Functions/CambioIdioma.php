<?php
/*
 * Funcion del archivo: Archivo que cambia el atributo idioma de la sesion por el idioma seleccionado por el usuario.
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
session_start();
$idioma = $_GET['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>
