/*=============================================
EDITAR EMPRESA
=============================================*/
$(".tablas").on("click", ".btnEditarEmpresa", function(){

	var idEmpresa = $(this).attr("idEmpresa");

	var datos = new FormData();
	datos.append("idEmpresa", idEmpresa);

	$.ajax({
		url: "ajax/empresas.ajax.php",
  		method: "POST",
      data: datos,
      cache: false,
      contentType: false,
    	processData: false,
      dataType:"json",
     	success: function(respuesta){


        
     		$("#editarEmpresa").val(respuesta["EmpNombreempresa"]);
     		$("#editarnuevaEmpresa").val(respuesta["idEmpresa"]);
        $("#editarEmpresaNit").val(respuesta["emnit"]);
        $("#editarEmpresaSig").val(respuesta["emsigla"]);
        $("#editarEmpresaRep").val(respuesta["emrepresentante"]);
        $("#editarEmpresaDir").val(respuesta["emdireccion"]);
        $("#editarEmpresaTel").val(respuesta["emtelefono"]);
        $("#editarEmpresaEmail").val(respuesta["ememail"]);

     	}

	})


})
/*=============================================
ELIMINSAR EMPRESA
=============================================*/

$(".tablas").on("click", ".btnEliminarEmpresa", function(){

  var idEmpresa = $(this).attr("idEmpresa");
  
  swal({
        title: '¿Está seguro de borrar la empresa?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar empresa!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=empresa&idEmpresa="+idEmpresa;
        }

  })

})