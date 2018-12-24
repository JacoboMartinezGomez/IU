<?php
/**
 * Vista para editar participaciones de loteria
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
    include_once '../Functions/Authentication.php';
    class LOTERIAIU_EDIT {

        function __construct($valores){
			
            $this->pinta($valores);
        }

//función que pinta la vista
    function pinta($valores){
        include '../View/Header.php';
		
  ?>
        <!--Ejemplo de formulario que realiza un edit-->
              <section id="useredit">
            <div class="formulario">
			
			<div class="deleteicons">
                <a href="../Controller/LOTERIAIU_Controller.php?action=default">
				<img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>" 
				title="<?php echo $strings['Volver']; ?>"></a>
         </div>
			
              <a name="edit"></a>
              <h1><?php echo $strings['Editar participacion']; ?></h1>
              <form class="edit" enctype="multipart/form-data" action="../Controller/LOTERIAIU_Controller.php" value="EDIT" method="POST" onChange="validarEdit()">
                  <div class="formleft">
                    <p><?php echo $strings['Email']; ?>:</p>
                      <input id="emailedit" type="text" name="email" readonly size='50' maxlength="50" value ="<?php echo $valores['lot.email']; ?>"required placeholder="Introduce el email" onblur="comprobarEmail(this)" >
                    <p><?php echo $strings['Nombre']; ?>:</p>
                      <input type="text" name="nombre" size='25' maxlength="25" value ="<?php echo $valores['lot.nombre']; ?>" placeholder="Introduce el nombre" id="nombreedit" onblur="comprobarAlfabetico(this, this.size)">
                    <p><?php echo $strings['Apellidos']; ?>:</p>
                      <input type="text" name="apellidos" size='50' maxlength="50" value ="<?php echo $valores['lot.apellidos']; ?>" placeholder="Apellido" id="apellidoedit" onBlur="comprobarAlfabetico(this, 50)">
					<p><?php echo $strings['Participacion']; ?>:</p>
                      <input type="number" name="participacion" min="1" max="999"  value ="<?php echo $valores['lot.participacion']; ?>" onblur="comprobarVacio(this), comprobarEntero(this,1,999)">
                    <p><?php echo $strings['Resguardo']; ?>:</p>
					<a href="<?php echo $valores['lot.resguardo']?>"><?php echo $valores['lot.resguardo']?></a>
						
					<p><?php echo $strings['Nuevo resguardo']; ?>:</p>	
					<input class="form-est" type="file" id="lot.resguardo" value ="<?php echo $valores['lot.resguardo']; ?>" name="resguardo" size="50" >

					<p><?php echo $strings['Ingresado']; ?></p>
					<select name="ingresado" >
						<option value="1"><?php echo $strings['Si']; ?></option>
						<option value="0"><?php echo $strings['No']; ?></option>
					</select>

					<p><?php echo $strings['Premio personal']; ?>:</p>
					<input type="number" name="premiopersonal" min="0" max="999999" value ="<?php echo $valores['lot.premiopersonal']; ?>" onblur="comprobarVacio(this), comprobarEntero(this,0,999999)">

					<p><?php echo $strings['Pagado']; ?></p>
					<select name="pagado" >
						<option value="1"><?php echo $strings['Si']; ?></option>
						<option value="0"><?php echo $strings['No']; ?></option>
					</select>

            </div>

                  <div class="enviar">
                      <button type="submit" value ="EDIT" id="editar" name="action" ><i class="fas fa-pencil-alt" ></i></button>
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
