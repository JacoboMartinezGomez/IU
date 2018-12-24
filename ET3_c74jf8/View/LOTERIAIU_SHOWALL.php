<?php
/**
 * Vista que muestra todas las participaciones que hay en la BD
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */

    include_once '../Functions/Authentication.php';

    class LOTERIAIU_SHOWALL {

        function __construct($lista,$message){

            $this->pinta($lista,$message);

        }
//función que pinta la vista
    function pinta($lista,$message){
        include '../View/Header.php';

        ?>
            <section class="showall">

            <div class="tabla">

               <div class="showallicons">
			    <a href="../Controller/LOTERIAIU_Controller.php?action=default"><img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>"title="<?php echo $strings['Volver']; ?>"></a>
                    <a href="../Controller/LOTERIAIU_Controller.php?action=SEARCH"><img id="searchadd" src="../View/images/icons/search.svg" title="Buscar"></a>
                    <a href="../Controller/LOTERIAIU_Controller.php?action=ADD"><img id="searchadd"  src="../View/images/icons/add.svg" title="Añadir"></a>
                </div>

                <a name="showall"></a>
                <h1><?php echo $strings['Participantes LOTERIAIU']; ?></h1>

                <table class="showall-tab">
                    <tr>
                       	<th><?php echo $strings['Email']; ?></th>
                        <th><?php echo $strings['Nombre']; ?></th> 
						<th><?php echo $strings['Participacion']; ?></th>
                    </tr>
                    <?php
                    //bucle que imprime las opciones para todas las tuplas
                    while ($row = $lista->fetch_array()){
                    ?>
                    <tr>
						<td><?php echo $row['lot.email']; ?></td>
						<td><?php echo $row['lot.nombre']; ?></td>
						<td><?php echo $row['lot.participacion']; ?></td>
						<td><a href="../Controller/LOTERIAIU_Controller.php?action=EDIT&email=<?php echo $row['lot.email']; ?>"><img src="../View/images/icons/edit.svg" title="Editar"></a>&nbsp 
						<a href="../Controller/LOTERIAIU_Controller.php?action=DELETE&email=<?php echo $row['lot.email']; ?>"><img src="../View/images/icons/delete.svg" title="Borrar"></a>
						<a href="../Controller/LOTERIAIU_Controller.php?action=SHOWCURRENT&email=<?php echo $row['lot.email']; ?>"><img src="../View/images/icons/view.svg" title="Detalles"></a></td>
                    </tr>																								
                    <?php
                    }
                    ?>
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
