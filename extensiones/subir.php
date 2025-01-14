<?php

function subir(){
   $file_type = $_FILES['file']['type'];
 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "archivo1";
 
        // Create connection
        if (!$conn = mysql_connect($servername,$username,$password)) {
            echo 'No pudo conectarse a mysql';
            exit;
        }
 
        if (!mysql_select_db($database, $conn)) {
            echo 'No pudo seleccionar la base de datos';
            exit;
        }    
 
//Upload File
 
if (isset($_POST['subir'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." subido." . "</h1>";
        echo "<h2>Datos subidos:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
 
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="insert into subir (subir) values ('".$data[0]."')";
 
        mysql_query($import) or die(mysql_error());
    }
 
    fclose($handle);
 
    print "Import hecho!";
 
    //view upload form
}
 
}

?>