<?php

  $mensaje="";
  if(isset($_POST["envio"])){
      include("extensiones/correo_enviar/php/envioCorreo.php");
      $email = new email("Nueva solicitud realizada.","archivobelal@gmail.com","tpa20190387");
      $email->agregar($_POST["email"],$_POST["nombre"]);

      //variables enviadas al archivo envioCorreo.php para ser incluidas dentro del cuerpo del mensaje del correo.
      $documento = $_POST["descDocumento"];
      $observaciones = $_POST["observaciones"];
            
      if ($email->enviar("Nueva solicitud realizada por ", $_SESSION["nombre"], $contenido_html)){
              
          $mensaje= 'mensaje enviado';
              
      }else{
               
         $mensaje= 'El mensaje no se pudo enviar';
         $email->ErrorInfo;
      }
}


require ('class.phpmailer.php');
include("class.smtp.php");

 $documento = $_POST["descDocumento"];
 $usuario = $_SESSION["nombre"];
 $observaciones = $_POST["observaciones"];


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
     $this->Host = 'smtp.gmail.com';  // Servidor GMAIL
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
   public function agregar($correo,$nombre = ''){
	   $this->addAddress($correo,$nombre);
    // $this->addCC("pereaemmanuel@yahoo.es",'Harold Campo Morales');
	}

}//--> fin clase
	
	$contenido_html =  "<div>
							<p style='color:black'>

							El usuario $usuario ha realizado una nueva solicitud al departamento de gestión documental. <br><br>

							Documento:  $documento <br>
              Observaciones: $observaciones <br>
              
							<p> <a href='http://192.24.33.88:8080/gd1'>Sistema de gestión documental GDPLUS<strong></a></p>
	
		    		</div>";



?><script>window.history.back();</script>