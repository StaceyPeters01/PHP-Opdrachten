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

    PrintResult($result);
 }

 function OvzBrouwers() {
    // haal alle brouwer records uit de database
    $result = GetData("brouwer");

    PrintResult($result);
 }

 

 function PrintResult($par) {
    //print table
    echo "<table border=1px>";
    foreach (array_keys($par[0]) as $key) {
         echo "<td>" . $key . "</td>";
    }
    foreach ($par as $data) {
        echo "<tr>";
        foreach (array_keys($data) as $dat) {
            echo "<td>" . $data [$dat] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
 }


 function CrudBieren(){
   $result = GetData("bier");
   PrintCrudBier($result);
 }

 function PrintCrudBier($result){
   $table = "<table border = 1px>";

   $headers = array_keys($result[0]);
   $table .= "<tr>";
   foreach($headers as $header){
      $table .= "<th bgcolor=gray>" . $header . "</th>";
   }
   $table .= "</tr>";

   foreach($result as $row){
      $table .= "<tr>";

      foreach($row as $cell){
         $table .= "<td>" . $cell . "</td>";
      }
      $table .= "</tr>";
   }
   $table .= "</table>";
   echo $table;
 }
?>