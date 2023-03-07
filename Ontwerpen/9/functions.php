<?php

 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 function GetData($table){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function OvzBieren(){

    // Haal alle bier record uit de tabel 
    $result = GetData("bier");
    
    //print table
    echo "<table border=1px>";
    foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" , $data ["biercode"];  "</td>";
        echo "<td>" , $data ["naam"];  "</td>";
        echo "<td>" , $data ["brouwcode"];  "</td>";
        echo "</tr>";
    }
    echo '"</table>';
 }

?>