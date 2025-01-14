/*=============================================
EDITAR Prestamo
=============================================*/
$(".tablas").on("click", ".btnEditarPrestamo", function(){

	var idPrestamo = $(this).attr("idPrestamo");

	var datos = new FormData();
	datos.append("idPrestamo", idPrestamo);

	$.ajax({
		url: "ajax/prestamos.ajax.php",
  		method: "POST",
      data: datos,
      cache: false,
      contentType: false,
    	processData: false,
      dataType:"json",
     	success: function(respuesta){


        $("#idPrestamo").val(respuesta["idPrestamo"]);
     	$("#editardescDocumento").val(respuesta["descDocumento"]);
		$("#editar_pres_prioridad").val(respuesta["pres_prioridad"]);
		$("#editar_pres_formato").val(respuesta["pres_formato"]);
        $("#editarfechaEntrega").val(respuesta["fechaEntrega"]);
        $("#editarnuevoFolio").val(respuesta["folios"]);
     	$("#editarfuncionario").val(respuesta["funcionario"]);
        $("#editarfechaDevolucion").val(respuesta["fechaDevolucion"]);
        $("#editarnuevoFuncionarioRec").val(respuesta["funcionarioRec"]);
        $("#editar_pres_estado").val(respuesta["pres_estado"]);
        $("#editarobservaciones").val(respuesta["observaciones"]);
       
     	}

	})


})
/*=============================================
ELIMINSAR SERIE
=============================================*/

$(".tablas").on("click", ".btnEliminarPrestamo", function(){

  var idPrestamo = $(this).attr("idPrestamo");
  
  swal({
        title: '¿Está seguro de borrar la prestamo documental?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar prestamo documental!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=prestamo&idPrestamo="+idPrestamo;
        }

  })

})