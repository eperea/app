<?php



require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";

require_once "controladores/series.controlador.php";

require_once "controladores/unidades.controlador.php";

require_once "controladores/empresa.controlador.php";

require_once "controladores/sede.controlador.php";

require_once "controladores/departamento.controlador.php";

require_once "controladores/caja.controlador.php";

require_once "controladores/estanteria.controlador.php";

require_once "controladores/deposito.controlador.php";

require_once "controladores/prestamo.controlador.php";

require_once "controladores/ubicacioncaja.controlador.php";

require_once "controladores/ubicacioncarpeta.controlador.php";

require_once "controladores/destruccion_carpeta.controlador.php";

require_once "controladores/destruccion_caja.controlador.php";

require_once "controladores/documentos.controlador.php";

require_once "controladores/subirpdf.controlador.php";

require_once "controladores/notificaciones.controlador.php";









require_once "modelos/usuarios.modelo.php";

require_once "modelos/series.modelo.php";

require_once "modelos/unidades.modelo.php";

require_once "modelos/empresa.modelo.php";

require_once "modelos/sede.modelo.php";

require_once "modelos/departamento.modelo.php";

require_once "modelos/caja.modelo.php";

require_once "modelos/estanteria.modelo.php";

require_once "modelos/deposito.modelo.php";

require_once "modelos/prestamo.modelo.php";

require_once "modelos/ubicacioncaja.modelo.php";

require_once "modelos/ubicacioncarpeta.modelo.php";

require_once "modelos/destruccion_carpeta.modelo.php";

require_once "modelos/destruccion_caja.modelo.php";

require_once "modelos/documentos.modelo.php";

require_once "modelos/subirpdf.modelo.php";

require_once "modelos/notificaciones.modelo.php";













$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();