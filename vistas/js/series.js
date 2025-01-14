/*=============================================

EDITAR SERIE

=============================================*/

$(".tablas").on("click", ".btnEditarSerie", function(){



	var idSerie = $(this).attr("idSerie");



	var datos = new FormData();

	datos.append("idSerie", idSerie);



	$.ajax({

		url: "ajax/series.ajax.php",

  		method: "POST",

      data: datos,

      cache: false,

      contentType: false,

    	processData: false,

      dataType:"json",

     	success: function(respuesta){





        

     		

        

     		$("#editarnuevaSerie").val(respuesta["idSeries"]);

        $("#editarnuevaCodigo").val(respuesta["codigo_serie"]);

        $("#editarSerie").val(respuesta["nombreSerie"]);

        $("#editarseriesIni").val(respuesta["seriesIni"]);

        $("#editarseriesFin").val(respuesta["seriesFin"]);



     	}



	})





})

/*=============================================

ELIMINSAR SERIE

=============================================*/



$(".tablas").on("click", ".btnEliminarSerie", function(){



  var idSerie = $(this).attr("idSerie");

  

  swal({

        title: '¿Está seguro de borrar la serie?',

        text: "¡Si no lo está puede cancelar la acción!",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar serie!'

      }).then(function(result){

        if (result.value) {

          

            window.location = "index.php?ruta=series&idSerie="+idSerie;

        }



  })



})