/*=============================================
EDITAR Estanteria
=============================================*/
$(".tablas").on("click", ".btnEditarEstanteria", function(){

	var idEstanteria = $(this).attr("idEstanteria");

	var datos = new FormData();
	datos.append("idEstanteria", idEstanteria);

	$.ajax({
		url: "ajax/estanterias.ajax.php",
  		method: "POST",
      data: datos,
      cache: false,
      contentType: false,
    	processData: false,
      dataType:"json",
     	success: function(respuesta){

        var datosDeposito = new FormData();
          
          datosDeposito.append("idDeposito",respuesta["idDeposito"]);

           $.ajax({

              url:"ajax/depositos.ajax.php",
              method: "POST",
              data: datosDeposito,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarnuevoidDeposito").val(respuesta["id"]);

                  $("#editarnuevoidDeposito").html(respuesta["dep_nombre"]);

              }

          })


      
     		$("#editarnuevaEstanteria").val(respuesta["idEstanteria"]);

        $("#editarnuevonum_estante").val(respuesta["num_estante"]);

        $("#editarnuevonum_entrepano").val(respuesta["num_entrepano"]);

        $("#editarnuevobloque").val(respuesta["bloque"]);

        $("#editarnuevoidDeposito").val(respuesta["idDeposito"]);

     	}

	})


})
/*=============================================
ELIMINSAR Estanteria
=============================================*/

$(".tablas").on("click", ".btnEliminarEstanteria", function(){

  var idEstanteria = $(this).attr("idEstanteria");
  
  swal({
        title: '¿Está seguro de borrar la estanteria?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar estanteria!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=estanteria&idEstanteria="+idEstanteria;
        }

  })

})