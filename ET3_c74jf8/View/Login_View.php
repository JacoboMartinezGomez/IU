<?php
/* 
 * Vista que muestra el login de acceso a la aplicacion.
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */

	class Login{

		function __construct(){
			$this->render();
		}

		function render(){
			include '../View/Header.php';

?>


		<div class="formulario">
			<h1><?php echo $strings['Acceder']; ?></h1>
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">

				 	<?php echo $strings['Usuario']; ?> : <input type = 'text' name = 'login' placeholder = 'Utiliza tu Dni' size = '9' value = '' onblur="javi1();"  ><br>
					<?php echo $strings['Contraseña']; ?> : <input type = 'password' name = 'password' placeholder = 'Letras y numeros' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)"  ><br>

					
					
					
					 <div class="enviar">
					<button value="Login" type="submit" name="action" ><i class="fas fa-sign-in-alt" ></i></button>
                </div>
					
			</form>

			<a href='../Controller/Register_Controller.php'><?php echo $strings['Registrar']; ?></a>
			
			
			
		</div>
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
