	<?php
/*
 * Menu horizontal de la pagina
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
 ?>
	<div id="divmenu">

             <nav>
 				<ul class="nav">
 					<li><a href="../Controller/LOTERIAIU_Controller.php?action=default"><?php echo $strings['Inicio']; ?></a></li>
 					<li><a href=""><?php echo $strings['Formularios']; ?></a>
 						<ul>
 							<li><a href="../Controller/LOTERIAIU_Controller.php?action=ADD"><?php echo $strings['Añadir']; ?></a></li>
 							<li><a href="../Controller/LOTERIAIU_Controller.php?action=SEARCH"><?php echo $strings['Buscar']; ?></a></li>
 							<li><a href="#"><?php echo $strings['Editar']; ?></a></li>
 						</ul>
 					</li>
 					<li><a href="#"><?php echo $strings['Tablas']; ?></a>
 						<ul>
 							<li><a href="../Controller/LOTERIAIU_Controller.php?action=default"><?php echo $strings['Participantes LOTERIAIU']; ?></a></li>
 							<li><a href="#"><?php echo $strings['Eliminar participacion']; ?></a></li>
 							<li><a href="#"><?php echo $strings['Mas detalles']; ?></a></li>
 						</ul>
 					</li>
 					<li><a href="#"><?php echo $strings['Contacto']; ?></a></li>
 				</ul>
 			</nav>


         </div>
