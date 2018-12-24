<?php
/*
 *Funcion del archivo: Vista de mensaje que se lanza despues de la ejecucion de algunas consultas contra la BD, como mensaje informativo al usuario.
 * Autor: c74jf8
 * Fecha: 23/11/2018
*/
class MESSAGE{
	function __construct($res,$volver){
		$this->respuesta = $res;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
				<div>
					<h3 style="<?php if(!IsAuthenticated()){ echo 'color:white;margin-top:150px;';} ?>"><?php echo $this->respuesta ?></h3>
					<p><a <?php echo '<a href=\'' . $this->volver . "'>" ?> <img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>"title="<?php echo $strings['Volver']; ?>"></a></p>
				</div>

<?php		
	include 'Footer.php';
	}
}
?>