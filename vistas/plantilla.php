<?php
session_start(); // Iniciar sesión

// Definir tiempo máximo de inactividad (ejemplo: 30 minutos)
$tiempo_maximo_inactividad = 50; // 30 minutos en segundos

// Verificar si la sesión está activa y si ha pasado el tiempo máximo de inactividad
if (isset($_SESSION['ultimo_movimiento'])) {
    $tiempo_inactivo = time() - $_SESSION['ultimo_movimiento'];
    if ($tiempo_inactivo > $tiempo_maximo_inactividad) {
        // Si ha pasado el tiempo de inactividad, destruir la sesión
        session_unset();  // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header("Location: login.php"); // Redirigir al login o página de inicio
        exit();
    }
}

// Actualizar el tiempo del último movimiento del usuario 
$_SESSION['ultimo_movimiento'] = time();

// Configuraciones de seguridad para las cookies de sesión
ini_set('session.cookie_httponly', 1); // Las cookies solo accesibles por HTTP
ini_set('session.cookie_secure', 1); // Requiere HTTPS para enviar las cookies (si usas HTTPS)

// Opcionalmente puedes usar session_regenerate_id para regenerar el ID de sesión en momentos clave
if (!isset($_SESSION['sesion_iniciada'])) {
    session_regenerate_id(true); // Regenerar ID de sesión
    $_SESSION['sesion_iniciada'] = true; // Marcar la sesión como iniciada
}

?>


<!DOCTYPE html>

<html>

<head>



  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">



  <title>Sistema de gestión documental</title>



  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <link rel="icon" href="vistas/img/plantilla/icono-blanco.png">

  



   <!--=====================================

  PLUGINS DE CSS

  ======================================-->



  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">



  <!-- Font Awesome -->

  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">



  <!-- Ionicons -->

  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">



  <!-- Theme style -->

  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  

  <!-- AdminLTE Skins -->

  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



   <!-- DataTables -->

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  
  
   <!-- select2 -->
  
  <link rel="stylesheet" type="text/css" href="vistas/dist/css/select2.css">



  <!--=====================================

  PLUGINS DE JAVASCRIPT

  ======================================-->



  <!-- jQuery 3 -->

  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  

  <!-- Bootstrap 3.3.7 -->

  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



  <!-- FastClick -->

  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  

  <!-- AdminLTE App -->

  <script src="vistas/dist/js/adminlte.min.js"></script>



  <!-- DataTables -->

  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>

  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>



  <!-- SweetAlert 2 -->

  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  
  
  <!-- select 2 -->
  
  
  <script src="vistas/dist/js/buscar/js/select2.js"></script>



</head>



<!--=====================================

CUERPO DOCUMENTO

======================================-->



<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

 

  <?php



  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){



   echo '<div class="wrapper">';



    /*=============================================

    CABEZOTE

    =============================================*/



    include "modulos/cabezote.php";



    /*=============================================

    MENU

    =============================================*/



    include "modulos/menu.php";



    /*=============================================

    CONTENIDO

    =============================================*/



    if(isset($_GET["ruta"])){



      if($_GET["ruta"] == "inicio" ||

         $_GET["ruta"] == "usuarios" ||

         $_GET["ruta"] == "series" ||

         $_GET["ruta"] == "unidades" ||

         $_GET["ruta"] == "unidadescentral" ||

         $_GET["ruta"] == "empresa" ||

         $_GET["ruta"] == "sede" ||

         $_GET["ruta"] == "departamento" ||

         $_GET["ruta"] == "caja" || 

         $_GET["ruta"] == "estanteria" ||

         $_GET["ruta"] == "deposito" ||     

         $_GET["ruta"] == "prestamo" ||          

         $_GET["ruta"] == "ubicacioncaja" ||

         $_GET["ruta"] == "ubicacioncarpeta" ||

         $_GET["ruta"] == "destruccioncarpeta" ||

         $_GET["ruta"] == "destruccioncaja" ||

         $_GET["ruta"] == "documentos" ||

         $_GET["ruta"] == "reportes" || 

         $_GET["ruta"] == "eliminados" ||           

         $_GET["ruta"] == "subirpdf" ||

         

       

        

         $_GET["ruta"] == "salir"){



        include "modulos/".$_GET["ruta"].".php";



      }else{



        include "modulos/404.php";



      }



    }else{



      include "modulos/inicio.php";



    }



    /*=============================================

    FOOTER

    =============================================*/



    include "modulos/footer.php";



    echo '</div>';



  }else{



    include "modulos/login.php";



  }



  ?>





<script src="vistas/js/plantilla.js"></script>

<script src="vistas/js/usuarios.js"></script>

<script src="vistas/js/series.js"></script>

<script src="vistas/js/unidades.js"></script>

<script src="vistas/js/empresas.js"></script>

<script src="vistas/js/sedes.js"></script>

<script src="vistas/js/departamentos.js"></script>

<script src="vistas/js/cajas.js"></script>

<script src="vistas/js/estanterias.js"></script>

<script src="vistas/js/deposito.js"></script>

<script src="vistas/js/prestamos.js"></script>

<script src="vistas/js/subirpdf.js"></script>

<script src="vistas/js/eliminados.js"></script>

<script src="vistas/js/gestorNotificaciones.js"></script>

<!-- Codigo para select2 -->

<script type="text/javascript">
  $(document).ready(function(){
      $('.mibuscador').select2({ width: '100%', height: '100%'});
     
  });

  </script>

</body>

</html>





