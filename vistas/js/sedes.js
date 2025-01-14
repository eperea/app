/*=============================================
EDITAR sede
=============================================*/
$(".tablas").on("click", ".btnEditarSede", function(){

	var idSede = $(this).attr("idSede");

	var datos = new FormData();
	datos.append("idSede", idSede);

	$.ajax({
		url: "ajax/sedes.ajax.php",
  		method: "POST",
      data: datos,
      cache: false,
      contentType: false,
    	processData: false,
      dataType:"json",
     	success: function(respuesta){


        
     		$("#editarSede").val(respuesta["SedLocalizacion"]);
     		$("#editarnuevaSede").val(respuesta["idSede"]);

     	}

	})


})
/*=============================================
ELIMINSAR sede
=============================================*/

$(".tablas").on("click", ".btnEliminarSede", function(){

  var idSede = $(this).attr("idSede");
  
  swal({
        title: '¿Está seguro de borrar la sede?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar sede!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=sede&idSede="+idSede;
        }

  })

})