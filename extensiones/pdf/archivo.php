<?php



session_start();



?>

<!--

To change this license header, choose License Headers in Project Properties.

To change this template file, choose Tools | Templates

and open the template in the editor.

-->



<html>

    <head>

        <meta charset="UTF-8">

       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

       <link rel="icon" href="../../vistas/img/plantilla/icono-negro.png">



        <style>

            * {  margin: 0px;  padding: 0px;}



            ::-webkit-scrollbar {



            display: none;

}



        </style>

    </head>

    <body>

        

       





        <?php



       

        include 'config.inc.php';



        if (isset($_POST['subirP'])) {

            # code...

            $db=new Conect_MySql();

            $sql = "select*from tbl_documentos where id_documento=".$_POST['subirP'];

            $query = $db->execute($sql);

            if($datos=$db->fetch_row($query)){

                   



                     ?>



                      

        <object class="PDFdoc" width="100%" height="100%" type="application/pdf" data="archivos/<?php echo $datos['nombre_archivo'];?>"></object>
    

             

                 <title><?php echo $datos['nombre_archivo']; ?></title>



                

                    <?php } } ?>

        



        

        </body>

</html>

