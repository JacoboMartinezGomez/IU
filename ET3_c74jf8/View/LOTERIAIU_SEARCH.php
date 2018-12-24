<?php
/**
 * Vista para buscar participaciones de loteria
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
    include_once '../Functions/Authentication.php';
 class LOTERIAIU_SEARCH {

        function __construct(){
            $this->pinta();
        }
//función que pinta la vista
    function pinta(){
          include '../View/Header.php';
        ?>
         <section id="usersearch">
              <div class="formulario">
			  <div class="deleteicons">
                <a href="../Controller/LOTERIAIU_Controller.php?action=default">
				<img id="searchadd" src="../View/images/icons/undo.svg" alt= "<?php echo $strings['Volver']; ?>"
				title="<?php echo $strings['Volver']; ?>"></a>

         </div>
			  
                  <a name="search"></a>
                    <h1><?php echo $strings['Buscar participacion']; ?></h1>
                    <form class="add" id="formadd" action="../Controller/LOTERIAIU_Controller.php" value="SEARCH" onsubmit="validarSearch()" method="POST">
                        <div class="formleft">
                          <p><?php echo $strings['Email']; ?>:</p>
                            <input id="emailadd" type="text" name="email" size='50' maxlength="50" placeholder="<?php echo $strings['Introduce el email']; ?>" onblur="comprobarEmail(this)">
                          <p><?php echo $strings['Nombre']; ?>:</p>
                            <input type="text" name="nombre" size='25' maxlength="25"  placeholder="<?php echo $strings['Introduce el nombre']; ?>" id="nombreadd" onblur="comprobarAlfabetico(this, this.size)">
						  <p><?php echo $strings['Apellidos']; ?>:</p>
							<input type="text" name="apellidos" size='25' maxlength="25"  placeholder="<?php echo $strings['Introduce los apellidos']; ?>" id="apellidoadd" onblur="comprobarAlfabetico(this, this.size)">
                          <p><?php echo $strings['Participacion']; ?>:</p>
                            <input type="number" name="participacion" min="1" max="999" placeholder ="<?php echo $strings['Introduce una cantidad']; ?>" onblur="comprobarEntero(this,1,999)">
						</div>
                        <div class="enviar">
                            <button value="SEARCH" type="submit" id="buscar" name="action" ><i class="fas fa-search" ></i></button>
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
