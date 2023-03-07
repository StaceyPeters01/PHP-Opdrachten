<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=bieren","root","");

    $query = $db->prepare("SELECT * FROM bier");
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    echo"<table>";
    foreach( $result as $data){
        echo "<tr>";
         echo "<td>" ,  $data['naam'] , "</td>";
         echo "<td>" , $data['alcohol'] , "</td>";
        echo "</tr>";
    }
    echo "</table>";
} 

catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}

?>