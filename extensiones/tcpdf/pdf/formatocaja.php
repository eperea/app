<?php

include_once '../../../extensiones/pdf/config.inc.php';


require_once "../../../controladores/caja.controlador.php";
require_once "../../../modelos/caja.modelo.php";
require_once "../../../controladores/unidades.controlador.php";
require_once "../../../modelos/unidades.modelo.php";
require_once "../../../controladores/estanteria.controlador.php";
require_once "../../../modelos/estanteria.modelo.php";


class imprimirFormatoCaja{
    
public $codigo;
    
public function traerImpresionCaja(){
    
        
//TRAER INFORMACION DE LA CAJA
        
$item = "idCaja";

$valor = $this->codigo;


$respuestaCaja = ControladorCajas::ctrMostrarCajas($item, $valor);

$caja_tipo = $respuestaCaja["caja_tipo"];

$caja_codigo = $respuestaCaja["caja_codigo"];

$caja_prefijo = $respuestaCaja["caja_prefijo"];

$caja_sufijo = $respuestaCaja["caja_sufijo"];




//TRAEMOS INFORMACION DEPOSITO Y ESTANTERIAS

$item1 = null;

$valor1 = null;

$ubicacion = ControladorEstanterias::ctrMostrarEstanterias1($item1, $valor1);

$ubi_deposito = $ubicacion["dep_nombre"];


//REQUERIMOS LA CLASE TCPDF

require_once'tcpdf_include.php';


$width = 594;  

$height = 841; 

$pageLayout = array($width, $height); //  or array($height, $width) 

$pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
$pdf->SetTitle('FORMTATO DESCRIPCION CONTENIDO CAJA');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetAutoPageBreak(true,20);
$pdf->SetMargins(20, 20, 20, false);


$pdf->startPageGroup();

$pdf->AddPage();

//-----------------------------------------------------------------------------------------------------------------
$barcode= $caja_codigo;
$barcode = $pdf->serializeTCPDFtagParameters(array($barcode, 'C128', '', '', 72, 25, 0.5, array('position'=>'S', 'border'=>false, 'padding'=>2, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>7, 'stretchtext'=>6), 'N'));

$bloque1 = <<<EOF

<BR>
<BR>

    <table>
        <tr>
            <td  style="width:150px"><img src="images/logo-blanco-lineal.png"></td>


            
            <td style="background-color:white; width:130px">
				
				<div style="font-size:8.5px; text-align:center; line-height:15px;">
					
					<br>
					FORMATO ROTULO CAJA
					
				</div>
			</td>
			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Oficina: ARCHIVO
					
					<br>
					
					emmanuel.perea.gdplus.co

				</div>
				
			</td>
			<td style="background-color:white; width:120px; text-align:center; color:red;"><br><br>CAJA N.<br> <span style=" text-aling:center;"><tcpdf method="write1DBarcode" params="$barcode" /></span></td>
			
        </tr>
    
    </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '' );

//--------------------------------------------------------------------

//TRAEMOS LA INFORMACION RELACIONADA DE BODEGA ESTANTERIA Y CAJA

$db=new Conect_MySql();

$sql = "SELECT * FROM formato_rotulo2 where idCaja = $valor";

$query = $db->execute($sql);
$value=$db->fetch_row($query);



$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:240px">

				Bodega: $value[dep_nombre]

			</td>
			
				<td style="border: 1px solid #666; background-color:white; width:100px">

				Bloque: $value[bloque]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:right">
			
				Estantería No: $value[num_estante]

			</td>
			
			<td style="border: 1px solid #666; background-color:white; width:100px">Bandeja No: $value[num_entrepano]</td>

		</tr>

		
		
		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:300px"></td>

		</tr>

		

	</table>





EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '' );

//--------------------------------------------------------------------
$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Codigo</td>
		<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha Ini</td>
		<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha Fin</td>
		<td style="border: 1px solid #666; background-color:white; width:330px; text-align:center">Descripcion</td>		
	
		

		</tr>

	</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '' );

//--------------------------------------------------------------------

   
//TRAER INFORMACION DE LA CARPETAS POR ID CAJA

        
$db=new Conect_MySql();
$sql = "SELECT * FROM unidad_documental where uni_caja = $valor";
$query = $db->execute($sql);
while($datos=$db->fetch_row($query)){
                    
   
$bloque4 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">
			$datos[codigo]
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center"> 
			$datos[UniFechaInicio]	
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">
			$datos[UniFechafin]
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:330px; text-align:center">
			$datos[descripcion]
			</td>
			
		
			

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	
EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



// --------------------------------------------------------
//SALIDA DEL ARCHIVO

$pdf->Output('formatocaja.pdf');

}

}

$formato = new imprimirFormatoCaja();
$formato ->codigo = $_GET["codigo"];
$formato ->traerImpresionCaja();

?>