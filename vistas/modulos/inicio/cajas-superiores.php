<?php



$item = null;

$valor = null;

$orden = "id";





$categorias = ControladorPrestamos::ctrMostrarprestamos($item, $valor);

$totalCategorias = count($categorias);



$clientes = ControladorCajas::ctrMostrarCajas($item, $valor);

$totalClientes = count($clientes);



$carpetas = ControladorCarpetas::ctrMostrarCarpetas($item, $valor);

$totalcarpetas = count($carpetas);



$cajas = ControladorCajaDestruccion::ctrMostrarCajaDestruccion($item, $valor);

$totalcajas = count($cajas);







$Usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $orden);

$totalUsuarios = count($Usuarios);





?>


<div class="col-lg-3 col-xs-6">



  <div class="small-box bg-white">

  

    <div class="inner">

    

      <h3><?php echo number_format($totalUsuarios); ?></h3>



      <p>Usuarios</p>

    

    </div>

    

    <div class="icon">

      

      <i class="fa fa-users"></i>

    

    </div>

    

    <a href="usuarios" class="small-box-footer">

      

      Más info <i class="fa fa-arrow-circle-right"></i>

    

    </a>



     </div>



  </div>






<div class="col-lg-3 col-xs-6">



  <div class="small-box bg-green">

    

    <div class="inner">

    

      <h3><?php echo number_format($totalCategorias); ?></h3>



      <p>Préstamos documentales</p>

    

    </div>

    

    <div class="icon">

    

      <i class="fa fa-book"></i>

    

    </div>

    

    <a href="prestamo" class="small-box-footer">

      

      Más info <i class="fa fa-arrow-circle-right"></i>

    

    </a>



  </div>



</div>



<div class="col-lg-3 col-xs-6">



  <div class="small-box bg-yellow">

    

    <div class="inner">

    

      <h3><?php echo number_format($totalClientes); ?></h3>



      <p>Cajas</p>

  

    </div>

    

    <div class="icon">

    

      <i class="fa fa-archive"></i>

    

    </div>

    

    <a href="caja" class="small-box-footer">



      Más info <i class="fa fa-arrow-circle-right"></i>



    </a>



  </div>



</div>








<div class="col-lg-3 col-xs-6">



  <div class="small-box bg-purple">

  

    <div class="inner">

    

      <h3><?php echo number_format($totalcarpetas); ?></h3>



      <p>Destruir Carpetas</p>

    

    </div>

    

    <div class="icon">

      

      <i class="fa fa-bullhorn"></i>

    

    </div>

    

    <a href="destruccioncarpeta" class="small-box-footer">

      

      Más info <i class="fa fa-arrow-circle-right"></i>

    

    </a>



  </div>



</div>



<div class="col-lg-3 col-xs-6">



  <div class="small-box bg-orange">

  

    <div class="inner">

    

      <h3><?php echo number_format($totalcajas); ?></h3>



      <p>Destrucción cajas</p>

    

    </div>

    

    <div class="icon">

      

      <i class="fa fa-archive"></i>

    

    </div>

    

    <a href="destruccioncaja" class="small-box-footer">

      

      Más info <i class="fa fa-arrow-circle-right"></i>

    

    </a>



  </div>



</div>



