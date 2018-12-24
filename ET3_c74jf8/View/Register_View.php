<?php
/**
 * Vista registrar usuarios en la aplicacion
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
	class Register{
		function __construct(){
			$this->render();
		}
		function render(){
			include '../View/Header.php'; 
		?>
	<div class="formulario">
			<h1><?php echo $strings['Registro']; ?></h1>
			<form class="add" id="formadd" action='../Controller/Register_Controller.php' method="post" onmousemove= "validarFormularioAdd()"> 
                
                    <p>Nombre:</p>
                    <input type="text" id="nombre1" name="nombre" size='25' onBlur="comprobarAlfabetico(this,this.size)" placeholder="Introduce el nombre">
                   
                    <p>Apellido:</p>
                    <input type="text" id="apellido1" name="apellidos" size='50' onBlur="comprobarAlfabetico(this,this.size)" placeholder="Introduce el apellido">
     
                    <p>Email:</p>
                    <input type="text" id="email1" name="email" size='50' onBlur="comprobarExpresionRegular(this, /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/, this.size)" placeholder="Introduce el email">
                
                    <p>Nombre de Usuario:</p>
                    <input type="text" id="login1" name="login" size='25' onBlur="comprobarTexto(this,this.size)" placeholder="Introduce el nombre de usuario">
                
                    <p>Contraseña:</p>
                    <input type="password" id="password1" name="password"  value='' onBlur="comprobarTexto(this,this.size)" size='20' placeholder="Crea una contraseña">
               
                    <p>Numero Telefono:</p>
                    <input type="text" id="tlf1" name="tlfuser" size='15' onBlur="comprobarTelf(this)" placeholder="Introduce el numero">
                
                    <p>DNI:</p>
                    <input type="text" id="dni1" name="dni" size='13' onBlur="comprobarDNI(this)" placeholder="Introduce el DNI">
                
                    <p>Fecha de nacimiento</p>
                    <input type="text" id="fecha1" class="tcal" name="fechnacuser" value='' onmousemove="comprobarFecha(this)" readonly placeholder="Selecciona una fecha">
                
                   
				   <div class="enviar">
						<button value="REGISTER" type="submit" name="action" id="butonAdd" ><i class="fas fa-plus" ></i></button>
                </div>
             
            </form>

		</div>


			<a href='../Controller/Index_Controller.php'><img id="searchadd" src="../View/images/icons/undo.svg" alt="<?php echo $strings['Volver']; ?>"title="<?php echo $strings['Volver']; ?>"></a>


		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
