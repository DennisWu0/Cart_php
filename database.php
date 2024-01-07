<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass="123456789";
    $db_name = "shopping";
    $conn="";

    try{
        $conn=mysqli_connect($db_server,
                             $db_user,
                             $db_pass,
                             $db_name);
    }
    catch (mysqli_sql_exception $e) {  // Correct syntax: catch (ExceptionType $variableName)
        echo "Error: " . $e->getMessage();  // Access exception message
    }

?>
