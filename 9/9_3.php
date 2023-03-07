<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=school","root","");

    $query = $db->prepare("SELECT * FROM cijfers");
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    echo"<table>";
    foreach( $result as $data){
        echo $data['id'] . " " . $data['leerling'] . " " . $data['cijfer'];
        echo "<br>";
    }
    echo "</table>";
} 

catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}

?>