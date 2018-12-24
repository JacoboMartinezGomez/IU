<?php
/*
 * Vista que muestra la cabecera de la pagina
 * Autor: c74jf8
 * Fecha: 23/11/2018
 */
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>


<html lang="es">
	<head>
        <meta charset="utf-8"/>
        <meta name="author" content="c74jf8"/>

        <link href='' rel='icon' type='image/x-icon'/>
        <link rel="stylesheet" href="../View/css/style.css"/>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="../View/css/tcal.css" />
        <script type="text/javascript" src="../View/js/tcal.js"></script>
        <script type="text/javascript" src="../View/js/Comprobaciones.js"></script>

  <!--Favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="../View/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../View/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../View/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../View/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../View/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../View/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../View/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../View/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../View/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../View/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../View/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../View/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../View/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

  <!--Importacion de fuentes de Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Hind+Guntur|Muli" rel="stylesheet"/>


        <title><?php echo $strings['LOTERIAIU']; ?></title>
				<title>
					<?php echo $strings['LOTERIAIU']; ?>
				</title>

	</head>

<body>

		
<header>

		 <div id="head-left">
		    <div id="divlogoprincipal">
	              <a href="#"><img id="logoprincipal" src="../View/images/loteria.png"/></a>
		         </div>

		 </div>
		      <div id="head-center">
		             <div id="divtitulo">
		                  <h1><?php echo $strings['LOTERIAIU']; ?></h1>
		    </div>
		     </div>

		   <div id="head-right">
		        <div id="dividioma">
								<?php echo $strings['Idioma']; ?>
								<a href="../Functions/CambioIdioma.php?idioma=SPANISH"><img src="../View/images/Spain.png"  title="<?php echo $strings['ESPAÑOL']; ?>" alt="<?php echo $strings['INGLES']; ?>"></a>
								<a href="../Functions/CambioIdioma.php?idioma=ENGLISH"><img src="../View/images/England.png" title="<?php echo $strings['INGLES']; ?>" alt="<?php echo $strings['ESPAÑOL']; ?>"></a>
						   		<a href="../Functions/CambioIdioma.php?idioma=GALLAECIAN"><img src="../View/images/Galicia.png" title="<?php echo $strings['GALLEGO']; ?>" alt="<?php echo $strings['GALLEGO']; ?>"></a>

  </div>

<?php
	if (IsAuthenticated()){
?>
		                    <div id="divlogin">

		                        <a href="#"><img src="../View/images/user.svg" alt="<?php echo $strings['Usuario']; ?>" title="<?php echo $strings['Usuario']; ?>"> <?php echo $_SESSION['login']?></a>
		                        <a href='../Functions/Desconectar.php'><img src="../View/images/icons/signout.svg" alt="<?php echo $strings['Desconectarse']; ?>"title="<?php echo $strings['Desconectarse']; ?>"></a>

		                    </div>
<?php
}
else{
?>											
	<a href='../Controller/Login_Controller.php'><?php echo $strings['Iniciar sesion'];?></a>
													
<?php		
			}
?>
</div>


</header>
<div id="divmenu">
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
		
	}
?>

<article>
