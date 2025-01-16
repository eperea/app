/*=============================================
EDITAR Deposito
=============================================*/
$(".tablas").on("click", ".btnEditarDeposito", function(){

	var idDeposito = $(this).attr("idDeposito");

	var datos = new FormData();

	datos.append("idDeposito", idDeposito);

	$.ajax({
		url: "ajax/depositos.ajax.php",
  		method: "POST",
      data: datos,
      cache: false,
      contentType: false,
    	processData: false,
      dataType:"json",
     	success: function(respuesta){


      
     		$("#editarnuevoDeposito").val(respuesta["id"]);
        $("#editarnuevoSigla").val(respuesta["dep_sigla"]);
        $("#editarnuevoNombre").val(respuesta["dep_nombre"]);
        $("#editarnuevoTipoalma").val(respuesta["dep_num_tipoalma"]);

        
     	}

	})


})
/*=============================================
ELIMINSAR Deposito
=============================================*/

$(".tablas").on("click", ".btnEliminarDeposito", function(){

  var idDeposito = $(this).attr("idDeposito");
  
  swal({
        title: '¿Está seguro de borrar la Deposito?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Deposito!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=deposito&idDeposito="+idDeposito;
        }

  })

})