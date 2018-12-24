<?php
/**
 * Vista para añadir participaciones de loteria
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
    include_once '../Functions/Authentication.php';
    class LOTERIAIU_ADD {

      function __construct(){

          $this->pinta();

      }
//función que pinta la vista
    function pinta(){

        include '../View/Header.php';
        ?>


 <section id="useradd">
      <div class="formulario">
		<div class="deleteicons">
                <a href="../Controller/LOTERIAIU_Controller.php?action=default"><img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>"title="<?php echo $strings['Volver']; ?>"></a>
         </div>
	  
          <a name="add"></a>
            <h1><?php echo $strings['Añadir participacion']; ?></h1>
            <form class="add" id="formadd" enctype="multipart/form-data" action="../Controller/LOTERIAIU_Controller.php" value="ADD" onChange="validarAdd()"; method="POST">
                <div class="formleft">
				    <p><?php echo $strings['Email']; ?>:</p>
                    <input id="emailadd" type="text" name="email" size='50' maxlength="50" required placeholder="<?php echo $strings['Introduce el email']; ?>" onblur="comprobarEmail(this)">
					<p><?php echo $strings['Nombre']; ?>:</p>
                    <input type="text" name="nombre" size='25' maxlength="25" required placeholder="<?php echo $strings['Introduce el nombre']; ?>" id="nombreadd" onblur="comprobarAlfabetico(this, this.size)">
					<p><?php echo $strings['Apellidos']; ?>:</p>
                    <input type="text" name="apellidos" size='50' maxlength="50" required placeholder="<?php echo $strings['Introduce los apellidos']; ?>" id="apellidoadd" onBlur="comprobarAlfabetico(this, 50)">
					<p><?php echo $strings['Participacion']; ?>:</p>
                    <input type="number" name="participacion" min="1" max="999" required placeholder="<?php echo $strings['Introduce una cantidad']; ?> "onChange="comprobarVacio(this,this.size), comprobarEntero(this,1,999)" id="participacion">
					<p><?php echo $strings['Resguardo']; ?>:</p>

 				<input class="form-est" type="file" id="resguardo" onblur="comprobarVacioFiles(this)" name="resguardo" size="50">
				
				
				
				
				<p><?php echo $strings['Ingresado']; ?></p>
					<select name="ingresado" >
						<option value="1"><?php echo $strings['Si']; ?></option>
						<option selected="selected" value="0"><?php echo $strings['No']; ?></option>
					</select>

					<p><?php echo $strings['Premio personal']; ?>:</p>
					<input type="number" name="premiopersonal" min="1" max="999999" value ="<?php echo $valores['lot.premiopersonal']; ?>" onblur="comprobarVacio(this), comprobarEntero(this,1,999999)">

					<p><?php echo $strings['Pagado']; ?></p>
					<select name="pagado" >
						<option value="1"><?php echo $strings['Si']; ?></option>
						<option selected="selected" value="0"><?php echo $strings['No']; ?></option>
					</select>
				</div>
				
				
				
				
                <div class="enviar">
                    <button value="ADD" type="submit" id="insertar" disabled name="action" ><i class="fas fa-plus" ></i></button>
                </div>

            </form>
        </div>
   </section>

        </body>
        </html>

        <?php
include '../View/Footer.php';
        }
    }
?>
