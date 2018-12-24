<?php
/**
 * Archivo php donde se gestionan las acciones principales para una participacion de loteria
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */

session_start(); //solicito trabajar con la session
include '../Functions/Authentication.php';
include '../View/MESSAGE_View.php';

if (!IsAuthenticated()){ //si no está autenticado

    new MESSAGE('You need sign in', '../Controller/Login_Controller.php'); //muestra el mensaje

}

else{ //si lo está

    require_once('../Model/LOTERIAIU_Model.php');
    include '../View/LOTERIAIU_SHOWALL.php';
    include '../View/LOTERIAIU_ADD.php';
    include '../View/LOTERIAIU_SEARCH.php';
    include '../View/LOTERIAIU_SHOWCURRENT.php';
    include '../View/LOTERIAIU_EDIT.php';
    include '../View/LOTERIAIU_DELETE.php';


    function get_data_form(){ //recoge los valores del formulario

		$email=$_REQUEST['email'];//Variable para el email
		$nombre=$_REQUEST['nombre'];//Variable para el nombre
		$apellidos=$_REQUEST['apellidos'];//Variable para apellidos
		$participacion=$_REQUEST['participacion'];//Variable participacion
		$ingresado = $_REQUEST['ingresado']; //Variable ingresado
		$premiopersonal = $_REQUEST['premiopersonal']; //Variable para premio personal
		$pagado = $_REQUEST['pagado'];//Variable para pagado
		$action = $_REQUEST['action']; //Variable action para la accion a realizar
		
		if($_FILES){
		$resguardo = '../Files/'.$_REQUEST['email'].'-'.$_FILES['resguardo']['name'];//Variable para el resguardo
			}
	
	else{
		$resguardo = $_REQUEST['resguardo'];
	}
        //crea una loteria
    $LOTERIAIU = new LOTERIAIU_Model(
			$email,
			$nombre,
			$apellidos,
			$participacion,
			$resguardo,
			$ingresado,
			$premiopersonal,
			$pagado);

        return $LOTERIAIU;
    }
	
	
	function get_data_form_search(){ //recoge los valores del formulario
        $email=$_REQUEST['email'];
		$nombre=$_REQUEST['nombre'];
		$apellidos=$_REQUEST['apellidos'];
		$participacion=$_REQUEST['participacion'];
        
   //crea una loteria
    $LOTERIAIU = new LOTERIAIU_Model(
      $email,
      $nombre,
      $apellidos,
	  $participacion,
	  "",
	  "",
	  "",
	  "");

        return $LOTERIAIU;
    }
	
	
	
	
	
    if (!isset($_REQUEST['action'])){ //si no hay accion, la asigna vacía
        $_REQUEST['action'] = '';
    }

    Switch ($_REQUEST['action']){ //switch case que controla las acciones

        //acción añadir
        case 'ADD':

            $LOTERIAIU; //coge los valores del formulario
						
            $respuesta; //almacena la respuesta que muestra el mensaje
                if (!$_POST){ //Si es por get envia un formulario para insertar participacion
                    new LOTERIAIU_ADD();
					}
                else{ //Sino recoge los datos introducidos en el formulario, los envia a la BD y manda mensaje
                    $LOTERIAIU = get_data_form();
					
					if(is_uploaded_file($_FILES["resguardo"]['tmp_name'])){
						
					if($resFoto = $LOTERIAIU->subidaFoto()){
						
						$respuesta = $LOTERIAIU->ADD();
						}
					}
                    new MESSAGE($resFoto.$respuesta, '../Controller/LOTERIAIU_Controller.php');
                }
                break;

	case 'DELETE':
			if (!$_POST){
				$LOTERIAIU = new LOTERIAIU_Model($_REQUEST['email'], '', '', '','', '', '', '');
				if(isset($_GET['borrar'])){
					$respuesta1 =$LOTERIAIU->DEL_IMG();
					$respuesta = $LOTERIAIU->DELETE();

					new MESSAGE($respuesta.$respuesta1, '../Controller/LOTERIAIU_Controller.php');
				}
				else{
					$valores = $LOTERIAIU->RellenaDatos();
					new LOTERIAIU_DELETE($valores);
				}
			}
			
			break;		
			
        //acción editar
        case 'EDIT':

            $LOTERIAIU; //crea un objecto del modelo
            $respuesta; //almacena la respuesta que muestra el mensaje
            $valores; //almacena los datos tras rellenarlos


                if (!$_POST){ //Si entra por get envia un formulario con los datos de la participacion que se quiere editar

                    $LOTERIAIU = new LOTERIAIU_Model($_REQUEST['email'], '', '','','','','','');
			        $valores = $LOTERIAIU->RellenaDatos();
                    new LOTERIAIU_EDIT($valores);
                }
                else{ //Si entra por post recoge los datos introducidos en el formulario, los envia a la BD y manda mensaje
                    $LOTERIAIU = get_data_form();
					$respuesta = $LOTERIAIU->EDIT();
		
                    new MESSAGE($respuesta, '../Controller/LOTERIAIU_Controller.php');
                }
                break;


        //acción buscar
        case 'SEARCH':

            $LOTERIAIU; //coge los valores del formulario
            $datos; //almacena los datos que busca
            $lista; //crea un array de los datos


                if (!$_POST){ //Si entra por get envia un formulario para buscar por los diferentes campos que tiene una participacion
                    new LOTERIAIU_SEARCH();
                }
                else{ //Si entra por post recoge los datos introducidos en el formulario, los envia a la BD y manda mensaje
                    $LOTERIAIU = get_data_form_search();
                    $datos = $LOTERIAIU->SEARCH();
					
                    $lista = array('email','nombre','apellidos','participacion','','','','');
                    new LOTERIAIU_SHOWALL( $datos, '../Controller/LOTERIAIU_Controller.php');
                }
                break;




        //acción mostrar en detalle
        case 'SHOWCURRENT':

            $LOTERIAIU; //crea un objecto del modelo
            $valores; //almacena los datos tras rellenarlos

                $LOTERIAIU = new LOTERIAIU_Model($_REQUEST['email'],'', '','','','','','');
                $valores = $LOTERIAIU->RellenaDatos();
                new LOTERIAIU_SHOWCURRENT($valores);
				
            break;

		//accion por defecto para mostrar todos los datos	
        default:

            $LOTERIAIU; //crea un objecto del modelo
            $datos; //almacena los datos
            $lista; //crea un array de los datos

                if (!$_POST){ //Si entra por get muestra vista SHOWALL
                    $LOTERIAIU = new LOTERIAIU_Model('','','','','','','','');
                }
                else{ //Si entra por post muestra SHOWALL con el atributo designado
                    $LOTERIAIU = new LOTERIAIU_Model($_REQUEST['email'],'','','','','','','');
                }
                //lo hace de todas formas
                $datos = $LOTERIAIU->AllData();
				
               new LOTERIAIU_SHOWALL( $datos, '../Controller/LOTERIAIU_Controller.php');
    }

}
?>
