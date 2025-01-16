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



//TRAEMOS INFORMACION DEPOSITO Y ESTANTERIAS

$db=new Conect_MySql();

$sql = "SELECT * FROM consulta_carpetas where codigo1 = $valor";

$query = $db->execute($sql);
$value1=$db->fetch_row($query);




//TRAEMOS INFORMACION DEPOSITO Y ESTANTERIAS

$item1 = null;

$valor1 = null;

$ubicacion = ControladorEstanterias::ctrMostrarEstanterias1($item1, $valor1);

$ubi_deposito = $ubicacion["dep_nombre"];

//TRAER INFORMACION DE LA CARPETAS POR ID CAJA

        
$db=new Conect_MySql();
$sql = "SELECT * FROM unidad_documental where codigo1 = $valor";
$query = $db->execute($sql);
while($datos=$db->fetch_row($query)){


//REQUERIMOS LA CLASE TCPDF

require_once'tcpdf_include.php';


$width = 330;  

$height = 420; 

$pageLayout = array($width, $height); //  or array($height, $width) 

$pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
$pdf->SetTitle('FORMTATO DESCRIPCION CONTENIDO CARPETA');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetAutoPageBreak(true,20);
$pdf->SetMargins(20, 20, 20, false);


$pdf->startPageGroup();

$pdf->AddPage();

//-----------------------------------------------------------------------------------------------------------------
$barcode= $value1[codigo1];
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
					FORMATO ROTULO CARPETA
					
				</div>
			</td>

						
        </tr>
    
    </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '' );

//--------------------------------------------------------------------


$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">


	
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:275px">

				Bodega: $value1[deposito]

			</td>
			
				
			
			
			

		</tr>

		<tr>

		 <td style="border: 1px solid #666; background-color:white; width:75px">

				Bloque: $value1[bloque]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:right">
			
				Estantería No: $value1[num_estante]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:100px">Bandeja No: $value1[num_entrepano]</td>


		</tr>

		

		
		
		<tr>

		<td style="border: 1px solid #666; background-color:white; width:75px">Caja No: $value1[caja_prefijo] $value1[caja_codigo] $value1[caja_sufijo] </td>

		<td style="border: 1px solid #666; background-color:white; width:100px">Código carpeta:</td>
		
		<td style="border: 1px solid #666; background-color:white; width:100px"><span style=" text-aling:center;"><tcpdf method="write1DBarcode" params="$barcode" /></span></td>
		</tr>

		<tr>

		<td style="border: 1px solid #666; background-color:white; width:175px; text-align:left; font-size: 10px;">Código Departamento:</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:100pxpx; text-align:center; font-size: 10px;">
			$datos[DEPARTAMENTO_idDepartamento]
			</td>

		</tr>

		

	</table>





EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '' );

//--------------------------------------------------------------------
$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:75px; text-align:center">Codigo</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Fecha Ini</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Fecha Fin</td>
			
	
		

		</tr>


	</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '' );




//--------------------------------------------------------------------

   

                    
   
$bloque4 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:75px; text-align:center">
			$datos[codigo]
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"> 
			$datos[UniFechaInicio]	
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
			$datos[UniFechafin]
			</td>			
				

		</tr>

		

		<tr>



		<td style="border: 1px solid #666; background-color:white; width:75px; text-align:left; font-size: 9px;">Descripción:</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:200pxpx; text-align:center; font-size: 10px;">
			$datos[descripcion]
			</td>



		</tr>

		<tr>

		

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

$pdf->Output('formato_carpeta.pdf');

}

}

$formato = new imprimirFormatoCaja();
$formato ->codigo = $_GET["codigo1"];
$formato ->traerImpresionCaja();

?>