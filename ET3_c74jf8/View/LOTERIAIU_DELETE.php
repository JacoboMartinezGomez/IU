<?php
/**
 * Vista que muestra la participacion que se desea borrar en detalle
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
 
	include_once '../Functions/Authentication.php';
    class LOTERIAIU_DELETE {
		
		function __construct($valores){
			$this->pinta($valores);
        }

//función que pinta la vista
    function pinta($valores){		

        include '../View/Header.php';
        ?>

		<section id="delete">
         <div class="tabledelete">

         <div class="deleteicons">
                <a href="../Controller/LOTERIAIU_Controller.php?action=default"><img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>"title="<?php echo $strings['Volver']; ?>"></a>
               
         </div>
          <a name="delete"></a>

          <h1><?php echo $strings['Eliminar participacion']; ?>:</h1>
         	
			 <table class="showall-tab">
						<tr>
							<th><?php echo $strings['Email']; ?></th><td><?php echo $valores['lot.email']; ?></td>
						</tr>
						<tr>
							<th><?php echo $strings['Nombre']; ?></th><td><?php echo $valores['lot.nombre']; ?></td> 
                        </tr>
						<tr>
							<th><?php echo $strings['Apellidos']; ?></th><td><?php echo $valores['lot.apellidos']; ?></td> 
                        </tr>
						<tr>
							<th><?php echo $strings['Participacion']; ?></th><td><?php echo $valores['lot.participacion']; ?></td> 
                        </tr>
				
              </table>
			
			<div class="enviar">
                      <button type="submit" value ="DELETE" id="borrar" name="action" onclick="location.href='../Controller/LOTERIAIU_Controller.php?action=DELETE&borrar=true&email=<?php echo $valores['lot.email']; ?>'" ><i class="fas fa-trash-alt" ></i></button>
			</div>
        </div>
</section>
</body>
</html>

<?php
include '../View/Footer.php';
}
}
?>
