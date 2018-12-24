<?php
/**
 * Vista que muestra el index
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */

class Index {

	function __construct(){
		$this->render();
	}
	function render(){

		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
 		include '../View/Footer.php';
	}
}
?>
<style>

</style>
