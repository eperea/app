<?php

require_once "../../controladores/unidades.controlador.php";
require_once "../../modelos/unidades.modelo.php";
require_once "../../controladores/series.controlador.php";
require_once "../../modelos/series.modelo.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new ControladorUnidades();
$reporte -> ctrDescargarReporte();