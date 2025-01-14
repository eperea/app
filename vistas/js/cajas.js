/*=============================================

EDITAR Caja

=============================================*/

$(".tablas").on("click", ".btnEditarCaja", function(){



  var idCaja = $(this).attr("idCaja");



  var datos = new FormData();

  datos.append("idCaja", idCaja);



  $.ajax({

    url: "ajax/cajas.ajax.php",

      method: "POST",

      data: datos,

      cache: false,

      contentType: false,

      processData: false,

      dataType:"json",

      success: function(respuesta){





        

        $("#editarCaja").val(respuesta["idEstanteria"]);

        $("#editarnuevaCaja").val(respuesta["idCaja"]);

        $("#editarnuevoTipo").val(respuesta["caja_tipo"]);

        $("#editarnuevoCodigo").val(respuesta["caja_codigo"]);

        $("#editarnuevoPrefijo").val(respuesta["caja_prefijo"]);

        $("#editarnuevoSufijo").val(respuesta["caja_sufijo"]);

        



      }



  })





})

/*=============================================

ELIMINSAR Caja

=============================================*/



$(".tablas").on("click", ".btnEliminarCaja", function(){



  var idCaja = $(this).attr("idCaja");

  

  swal({

        title: '¿Está seguro de borrar la Caja?',

        text: "¡Si no lo está puede cancelar la acción!",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar Caja!'

      }).then(function(result){

        if (result.value) {

          

            window.location = "index.php?ruta=caja&idCaja="+idCaja;

        }



  })



})


/*=============================================

IMPRIMIR CAJA

=============================================*/


$(".tablas").on("click", ".btnImprimirCaja", function(){
    
    var codigoCaja = $(this).attr("codigoCaja");
    
    window.open("extensiones/tcpdf/pdf/formatocaja.php?codigo="+codigoCaja, "_blank")
    
})
    