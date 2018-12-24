<?php
/**
 * Modelo que accede a la base de datos para gestionar las participaciones de loteria
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */

class LOTERIAIU_Model {

	var $email;
	var $nombre;
	var $apellidos;
	var $participacion;
	var $resguardo;
	var $ingresado;
	var $premiopersonal;
	var $pagado;
	var $mysqli;

//Constructor de la clase

function __construct($email,$nombre,$apellidos,$participacion,$resguardo,$ingresado,$premiopersonal,$pagado){
	$this->email = $email;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->participacion = $participacion;
	$this->resguardo = $resguardo;
	$this->ingresado = $ingresado;
	$this->premiopersonal = $premiopersonal;
	$this->pagado = $pagado;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

function subidaFoto(){
	$nombrearchivo = $this->email.'-'.$_FILES['resguardo']['name'];	
	$FileType = pathinfo($_FILES["resguardo"]["name"],PATHINFO_EXTENSION);
	$directorio = "../Files/";
	$ruta = $directorio.basename($nombrearchivo);
	//Comprobacion de tipo de archivo
		if($FileType != "png" && $FileType != "jpg" && $FileType != "gif" && $FileType != "") {
			return "Solamente se pueden subir archivos con extension png, jpg o gif.";
			return false;
		}else {//Comprobacion del tamaño
			if ($_FILES["resguardo"]['size'] > 5000000) {
				return "Tu archivo pesa demasiado.";
				return false;
			}else{
				if(move_uploaded_file($_FILES['resguardo']['tmp_name'],$ruta)){
					return "Foto subida correctamente.";
				}
				else{
					return false;
				}
			}
		}
}

//Cambiar permisos para que deje subir los archivos sin problema
# chmod -R 0777 /var/www/html/web/


//funcion AllData
//devuelve la tabla
    function AllData(){

        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql
        $result; //almacena el valor de la variable resultado

        // construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM `LOTERIAIU` ";
		
        if (!($resultado = $this->mysqli->query($sql))){ // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'No existe en la BD';
        }
        else{ // si existe se devuelve la tupla resultado
            $result = $resultado;
            return $result;
        }
    }//fin metodo AllData


//Metodo ADD
//Inserta en la tabla  de la bd  los valores
//de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
function ADD()
{
		$sql; //variable que alberga la sentencia sql
		$result; //almacena la consulta sql

		if (($this->email <> '')){ // si el atributo clave de la entidad no esta vacio

				// construimos el sql para buscar esa clave en la tabla
				$sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->email')";
					
				if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
						return 'No es posible conectar la BD'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
				}
				else { // si la ejecución de la query no da error
						if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
								//construimos la sentencia sql de inserción en la bd
	
								$sql = "INSERT INTO `LOTERIAIU` (`lot.email`,`lot.nombre`, `lot.apellidos`, `lot.participacion`, `lot.resguardo`, `lot.ingresado`, `lot.premiopersonal`, `lot.pagado`)
														VALUES ('".$this->email."','".$this->nombre."', '".$this->apellidos."','".$this->participacion."','".$this->resguardo."' ,'".$this->ingresado."' ,'".$this->premiopersonal."' ,'".$this->pagado."');";
								if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
												return 'Error';

								}
								else{ //si no da error en la insercion devolvemos mensaje de éxito
										return 'Insertado correctamente'; //operacion de insertado correcta
								}

						}
						else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
					return 'Ya se encuentra en la base de datos'; // ya existe
				}
		}
		else{ // si el atributo clave de la bd es vacio solicitamos un valor en un mensaje
				return 'Introduce un valor'; // introduzca un valor para el usuario
		}
} // fin del metodo ADD

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{
}
//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
	$sql; //variable que alberga la sentencia sql
	        $resultado; //almacena la consulta sql

	        // construimos la sentencia de busqueda con LIKE y los atributos de la entidad
	        $sql = "SELECT *
	       	from `LOTERIAIU`
					WHERE ((`lot.email` LIKE '%$this->email%')&&
						(`lot.nombre` LIKE '%$this->nombre%') &&
						(`lot.apellidos` LIKE '%$this->apellidos%') &&
						(`lot.participacion` LIKE '%$this->participacion%'))" ;

	        if (!($resultado = $this->mysqli->query($sql))){ // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
	         return 'Error en la consulta a la BD';
	        }
	        else{ // si la busqueda es correcta devolvemos el recordset resultado
	            return $resultado;
	        }
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez verificado la borra
function DELETE()
    {
        $sql; //variable que alberga la sentencia sql
        $result; //almacena la consulta sql

        // se construye la sentencia sql de busqueda con los atributos de la clase
        $sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->email')";
		
        $result = $this->mysqli->query($sql); // se ejecuta la query

        if ($result->num_rows == 1) // si existe una tupla con ese valor de clave
        {
            // se construye la sentencia sql de borrado
            $sql = "DELETE FROM `LOTERIAIU` WHERE (`lot.email` = '".$this->email."')";

            $this->mysqli->query($sql); // se ejecuta la query

            return 'Borrado correctamente'; // se devuelve el mensaje de borrado correcto si se ejecuto correctamente
        }
        else // si no existe el login a borrar
            return 'No existe en la base de datos'; //se devuelve el mensaje de que no existe
    } // fin metodo DELETE

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
 {
        $sql; //variable que alberga la sentencia sql
        $resultado; //almacena la consulta sql 
        $result; //almacena el valor de la variable resultado

        // se construye la sentencia de busqueda de la tupla
        $sql = "SELECT * FROM `LOTERIAIU` WHERE `lot.email` = '$this->email'";

        if (!($resultado = $this->mysqli->query($sql))){ // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
            return 'No existe en la base de datos'; 
        }
        else{ // si existe se devuelve la tupla resultado
            $result = $resultado->fetch_array();
            return $result;
        }
    } // fin metodo RellenaDatos

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
	$sql; //variable que alberga la sentencia sql
	$sql2; //Varbiale segunda sentencia sql
    $result; //almacena la consulta sql
    $resultado; //almacena la consulta sql
		 
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM `LOTERIAIU` WHERE (`lot.email` = '$this->email')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
					
				$sql = "UPDATE `LOTERIAIU` SET
 						`lot.nombre`= '$this->nombre',
 						`lot.apellidos`= '$this->apellidos',
						`lot.participacion`= '$this->participacion',
						`lot.ingresado`= '$this->ingresado',
						`lot.premiopersonal`= '$this->premiopersonal',
						`lot.pagado`= '$this->pagado'
 				WHERE ( `lot.email` = '$this->email'
 				)";
				
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			
			return 'Error en la modificación'; 
		}
		else{ // si no hay problemas con la modificación se indica que se ha modificado
				//Si el usuario no ha subido una foto no se modifica


			if($this->resguardo=="../Files/".$this->email."-"){
				
					return 'Modificado correctamente';
		    }	
			else{//Si la subio llamamos a la funcion de subida al servidor y modificamos el valor de la foto en la BD
				if($this->subidaFoto()){
		
					$sql2 = "UPDATE LOTERIAIU SET `lot.resguardo` = '$this->resguardo' WHERE (`lot.email` = '$this->email')";
			
					$resultado2 = $this->mysqli->query($sql2);
					return "Foto actualizada";
				}else{
					
				return "Foto no subida.";
				}
			}
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe en la base de datos';
}


//Funcion que borra una imagen del servidor
function DEL_IMG(){
	$sql = "SELECT `lot.resguardo` FROM `LOTERIAIU` WHERE `lot.email` = '$this->email'";

	$result = $this->mysqli->query($sql);
		
	if ($result->num_rows == 0){
		return " Error en el borrado del resguardo.";
	}else{
		$tupla = mysqli_fetch_assoc($result);
		unlink($tupla['lot.resguardo']);
		return " Resguardo borrado correctamente.";
	}
}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el
// error correspondiente
function login(){

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login')
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

//
function Register(){

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			nombre,
			apellidos,
			email)
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}
	}

}//fin de clase

?>
