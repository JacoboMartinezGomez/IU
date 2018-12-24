<?php
/**
 * Vista que muestra la participacion en detalle en detalle
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
 
	include_once '../Functions/Authentication.php';
    class LOTERIAIU_SHOWCURRENT {
		
		function __construct($valores){
			$this->pinta($valores);
        }
//función que pinta la vista
    function pinta($valores){		

        include '../View/Header.php';
        ?>
        <section id="showcurrent">
         <div class="tabledelete">

         <div class="deleteicons">
                <a href="../Controller/LOTERIAIU_Controller.php?action=default">
				<img id="searchadd" src="../View/images/icons/undo.svg" alt= "<?php echo $strings['Volver']; ?>"
				title="<?php echo $strings['Volver']; ?>"></a>
               
         </div>

          <a name="showcurrent"></a>
          <h1><?php echo $strings['Mas detalles']; ?>:</h1>

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
						<tr>
							<th><?php echo $strings['Resguardo']; ?></th><td><?php echo $valores['lot.resguardo']; ?></td> 
                        </tr>
						<tr>
							<th><?php echo $strings['Ingresado']; ?></th><td><?php echo $valores['lot.ingresado']; ?></td> 
                        </tr>
						<tr>
							<th><?php echo $strings['Premio personal']; ?></th><td><?php echo $valores['lot.premiopersonal']; ?></td> 
                        </tr>
						<tr>
							<th><?php echo $strings['Pagado']; ?></th><td><?php echo $valores['lot.pagado']; ?></td> 
                        </tr>
				
              </table>
			
        </div>
</section>
</body>
</html>

<?php
include '../View/Footer.php';
}
}
?>