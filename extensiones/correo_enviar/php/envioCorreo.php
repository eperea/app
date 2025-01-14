<?php

require ('class.phpmailer.php');

include("class.smtp.php");



 $documento1 = $_POST["descDocumento"];             
 $prioridad1 = $_POST["pres_prioridad"];     
 $formato1 = $_POST["pres_formato"];
 $usuario = $_SESSION["nombre"];
 $observaciones1 = $_POST["observaciones"];

    

 $documento = $_POST["editardescDocumento"];
 $prioridad = $_POST["editar_pres_prioridad"];
 $formato = $_POST["editar_pres_formato"];
 $observaciones = $_POST["editarobservaciones"];
 $fecha_prestamo =     $_POST["editarfechaEntrega"];

      $numero_folios =      $_POST["editarnuevoFolio"];

      $estado_consulta =    $_POST["editar_pres_estado"];

      $fecha_devolucion =   $_POST["editarfechaDevolucion"];

      $funcionario_recibe = $_POST["editarnuevoFuncionarioRec"];      





class Email  extends PHPMailer{



    //datos de remitente

    var $tu_email;

    var $tu_nombre;

    var $tu_password;

    

    /**

 * Constructor de clase

 */

    public function __construct($tu_nombre,$tu_email,$tu_password)

    {

      //configuracion general

     $this->IsSMTP(); // protocolo de transferencia de correo

     $this->Host = 'demo.gdplus.co';  // Servidor GMAIL

     $this->Port = 465; //puerto

     $this->SMTPAuth = true; // Habilitar la autenticación SMTP

     $this->Username = $this->tu_email=$tu_email;

     $this->Password = $this->tu_password=$tu_password;

     $this->SMTPSecure = 'ssl';  //habilita la encriptacion SSL

     //remitente

     $this->From = $this->tu_email;

     $this->FromName = $this->tu_nombre=$tu_nombre;

	   $this->CharSet='UTF8';

    }



    /**

 * Metodo encargado del envio del e-mail

 */

    public function enviar($asunto , $asunto1, $contenido)

    {





      //$this->AddAddress($para,$nombre );  // Correo y nombre a quien se envia

	   

	   //$this->addBCC("harold-c-m@hotmail.com",'Harold Campo Morales'); 

       $this->WordWrap = 50; // Ajuste de texto

       $this->IsHTML(true); //establece formato HTML para el contenido

       $this->Subject =$asunto . $asunto1;

       $this->Body    =  $contenido; //contenido con etiquetas HTML

       $this->AltBody =  strip_tags($contenido); //Contenido para servidores que no aceptan HTML

	   //$this->addAttachment("archivoadjunto.pdf",'Prueba 1.pdf');

	   //$this->addAttachment("archivoadjunto.pdf",'Prueba 2.pdf');

       //envio de e-mail y retorno de resultado

       return $this->Send() ;

   }

   public function agregar($correo,  $nombre = '', $correo1){

	   $this->addAddress($correo,  $nombre);

     $this->addCC($correo1, $_SESSION["nombre"]);

	}



}//--> fin clase

	

	$contenido_html =  "<div>

							<p style='color:black'>



							Su solicitud ha sido enviada con &eacute;xito!. <br><br>

              El tiempo de respuesta es de m&aacute;ximo 1 hora, siempre que la informaci&oacute;n se encuentre dentro de las instalaciones de la sede principal. Muchas gracias! <br><br>

							<strong>Documento:</strong>  {$documento1}  <br>

              <strong>Prioridad:</strong> {$prioridad1} <br>

              <strong>Formato:</strong> {$formato1} <br>

              <strong>Observaciones:</strong> {$observaciones1} <br><br>

              <strong>Lo invitamos a seguir el estado de sus consultas visitando la aplicaci&oacute;n a trav&eacute;s del siguiente link: </strong>

							<p> <a href='https://demo.gdplus.co'>Sistema de gesti&oacute;n documental GDPLUS<strong></a></p>

			    		</div>";



$contenido_html1 =  "<div>

              <p style='color:black'>



              Su solicitud presenta la siguiente novedades: <br><br>

              <strong>Estado Consulta:</strong> {$estado_consulta} <br>

              <strong>Documento:</strong>  {$documento}  <br>

              <strong>Prioridad:</strong> {$prioridad} <br>

              <strong>Formato:</strong> {$formato} <br>

              <strong>Observaciones:</strong> {$observaciones} <br>

              <strong>Fecha pr&eacute;stamo:</strong>  {$fecha_prestamo}  <br>

              <strong>Nº Folios:</strong> {$numero_folios} <br>              

              <strong>Fecha Devoluci&oacute;n:</strong> {$fecha_devolucion} <br>

              <strong>Funcionario que recibe en Archivo:</strong> {$funcionario_recibe} <br><br>



              <strong>Lo invitamos a seguir el estado de sus consultas visitando la aplicaci&oacute;n a trav&eacute;s del siguiente link: </strong>

              <p> <a href='https://demo.gdplus.co'>Sistema de gesti&oacute;n documental GDPLUS<strong></a></p>

              </div>";

?>