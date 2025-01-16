/*=============================================
EDITAR Subir
=============================================*/

$(".editararchivoPdf").change(function(){

  var imagen = this.files[0];
  console.log("imagen", imagen);

  });

$(".tablas").on("click", ".btnEditarSubir", function(){

  var idSubir = $(this).attr("idSubir");

  

  var datos = new FormData();
  datos.append("idSubir", idSubir);

  $.ajax({
    url: "ajax/subirpdf.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success: function(respuesta){



     var datosSerie = new FormData();





     datosSerie.append("idSerie",respuesta["unidades"]);



     $.ajax({



      url:"ajax/series.ajax.php",

      method: "POST",

      data: datosSerie,

      cache: false,

      contentType: false,

      processData: false,

      dataType:"json",

      success:function(respuesta){




                  // $("#editarunidades").val(respuesta["idSeries"]);



                  $("#editarunidades").html(respuesta["codigo_serie"] + " - " + respuesta["nombreSerie"] );





                }



              })

     var extension = "extensiones/pdf/archivos/";

     $("#editarnuevaId").val(respuesta["id_documento"]);
     $("#editarnuevaSubirpdf").val(respuesta["titulo"]);
     $("#editarSubirpdf").val(respuesta["descripcion"]);
     $("#editarnota").val(respuesta["nota"]);
     // $("#documentoActual").val(respuesta["nombre_archivo"]);
     $(".previsualizar").attr("data", extension+respuesta["nombre_archivo"]);

     

   }

 })



})
/*=============================================
ELIMINSAR sede
=============================================*/

$(".tablas").on("click", ".btnEliminarSubir", function(){

  var idSubir = $(this).attr("idSubir");
  
  swal({
    title: '¿Está seguro de borrar la Subir?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar Subir!'
  }).then(function(result){
    if (result.value) {

      window.location = "index.php?ruta=subirpdf&idSubir="+idSubir;
    }

  })

})


