/*=============================================

CARGAR LA TABLA DINAMICA DE UNIDADES DOCUMENTALES

=============================================*/





// $.ajax({



// url: "ajax/datatable-unidades.ajax.php",





// success:function(respuesta){

 



// console.log("respuesta", respuesta);

  

  

// }





// })





var idoculto = $("#idoculto").val();



$('.tablaUnidades').DataTable( {

        "ajax": "ajax/datatable-unidades.ajax.php?idoculto="+idoculto,

        "deferRender": true,

  "retrieve": true,

  "processing": true,

   "language": {



      "sProcessing":     "Procesando...",

      "sLengthMenu":     "Mostrar _MENU_ registros",

      "sZeroRecords":    "No se encontraron resultados",

      "sEmptyTable":     "Ningún dato disponible en esta tabla",

      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",

      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",

      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

      "sInfoPostFix":    "",

      "sSearch":         "Buscar:",

      "sUrl":            "",

      "sInfoThousands":  ",",

      "sLoadingRecords": "Cargando...",

      "oPaginate": {

      "sFirst":    "Primero",

      "sLast":     "Último",

      "sNext":     "Siguiente",

      "sPrevious": "Anterior"

      },

      "oAria": {

        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

        "sSortDescending": ": Activar para ordenar la columna de manera descendente"

      }



  }





    } );





/*=============================================

EDITAR UNIDAD

=============================================*/

$(".tablaUnidades").on("click", "button.btnEditarUnidad", function(){



	var idUnidad = $(this).attr("idUnidad");



	var datos = new FormData();

	datos.append("idUnidad", idUnidad);



	$.ajax({

		url: "ajax/unidades.ajax.php",

  		method: "POST",

      data: datos,

      cache: false,

      contentType: false,

    	processData: false,

      dataType:"json",

     	success: function(respuesta){

 

 //EMPRESA



           var datosEmpresa = new FormData();





           datosEmpresa.append("idEmpresa",respuesta["EMPRESA_idEmpresa"]);

 

           $.ajax({



              url:"ajax/empresas.ajax.php",

              method: "POST",

              data: datosEmpresa,

              cache: false,

              contentType: false,

              processData: false,

              dataType:"json",

              success:function(respuesta){

                  

                  $("#editarnuevaEmpresa").val(respuesta["idEmpresa"]);



                  $("#editarnuevaEmpresa").html(respuesta["EmpNombreempresa"]);



              }



          })

 //SEDE



           var datosSede = new FormData();





           datosSede.append("idSede",respuesta["SEDE_idSede"]);

 

           $.ajax({



              url:"ajax/sedes.ajax.php",

              method: "POST",

              data: datosSede,

              cache: false,

              contentType: false,

              processData: false,

              dataType:"json",

              success:function(respuesta){

                  

                  $("#editarnuevaSede").val(respuesta["idSede"]);



                  $("#editarnuevaSede").html(respuesta["SedLocalizacion"]);



              }



          })



  //DEPARTAMENTO



           var datosDepartamento = new FormData();





           datosDepartamento.append("idDepartamento",respuesta["DEPARTAMENTO_idDepartamento"]);

 

           $.ajax({



              url:"ajax/departamentos.ajax.php",

              method: "POST",

              data: datosDepartamento,

              cache: false,

              contentType: false,

              processData: false,

              dataType:"json",

              success:function(respuesta){

                  

                  $("#editarnuevaDepartamento").val(respuesta["idDepartamento"]);



                  $("#editarnuevaDepartamento").html(respuesta["DepCodigo"]);



              }



          })



           //SERIE

  

           var datosSerie = new FormData();





           datosSerie.append("idSerie",respuesta["SERIES_idSeries"]);

 

           $.ajax({



              url:"ajax/series.ajax.php",

              method: "POST",

              data: datosSerie,

              cache: false,

              contentType: false,

              processData: false,

              dataType:"json",

              success:function(respuesta){

                  

                  $("#editarnuevaSerie_id").val(respuesta["idSeries"]);



                  $("#editarnuevaSerie_id").html(respuesta["codigo_serie"] + " " + respuesta["nombreSerie"] );



              }



          })





           //SERIE

  

           var datosCaja = new FormData();





           datosCaja.append("idCaja",respuesta["uni_caja"]);

 

           $.ajax({



              url:"ajax/cajas.ajax.php",

              method: "POST",

              data: datosCaja,

              cache: false,

              contentType: false,

              processData: false,

              dataType:"json",

              success:function(respuesta){

                  

                  $("#editarnuevaCaja").val(respuesta["idCaja"]);



                  $("#editarnuevaCaja").html(respuesta["caja_prefijo"] + " " + respuesta["caja_codigo"] );



              }



          })







         



        $("#editarnuevaIdunidad").val(respuesta["idUnidaddocumental"]);



     		$("#editarnuevaUnidad").val(respuesta["codigo"]);



        $("#editarnuevaUnidad1").val(respuesta["codigo1"]);



        $("#editarnuevaSubserie").val(respuesta["cod_subserie"]);



        $("#editardescripcion").val(respuesta["descripcion"]);



     		$("#editarnuevaFechaIni").val(respuesta["UniFechaInicio"]);



        $("#editarnuevaFechafin").val(respuesta["UniFechafin"]);



        $("#editarTiempogest").val(respuesta["tiemp_arch_gest"]);



        $("#editarTiempocent").val(respuesta["tiemp_arch_cent"]);



        $("#editarconservacion").val(respuesta["conservacion"]);



        $("#editarfechadestruccion").val(respuesta["fechadestruccion"]);



        $("#editarnuevaObservacion").val(respuesta["UniObservaciones"]);



        $("#editarnuevaEmpresa").val(respuesta["EMPRESA_idEmpresa"]);



        $("#editarnuevaSede").val(respuesta["SEDE_idSede"]);



        $("#editarnuevaDepartamento").val(respuesta["DEPARTAMENTO_idDepartamento"]);



        $("#editarnuevaSerie_id").val(respuesta["SERIES_idSeries"]);



        $("#editarnuevaCaja").val(respuesta["uni_caja"]);





     	}



	})





})





/*=============================================

ELIMINSAR SERIE

=============================================*/

$(".tablaUnidades").on("click", "button.btnEliminarUnidad", function(){



  var idUnidad = $(this).attr("idUnidad");

  

  swal({

        title: '¿Está seguro de borrar la unidad documental?',

        text: "¡Si no lo está puede cancelar la acción!",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#3085d6',

        cancelButtonColor: '#d33',

        cancelButtonText: 'Cancelar',

        confirmButtonText: 'Si, borrar unidad documental!'

      }).then(function(result){

        if (result.value) {

          

            window.location = "index.php?ruta=unidades&idUnidad="+idUnidad;

        }



  })



})



/*=============================================

IMPRIMIR FACTURA

=============================================*/




$(".tablaUnidades").on("click", "button.btnImprimirFactura", function(){



  var idUnidad = $(this).attr("idUnidad");



   window.open("extensiones/tcpdf/pdf/formatocarpeta.php?codigo1="+idUnidad, "_blank")



})
