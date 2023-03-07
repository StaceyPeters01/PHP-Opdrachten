<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=fietsenmaker","root","");

    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    echo"<table>";
    foreach( $result as $data){
        echo "<a href='9_2.php?id=" . $data['id'] . "'>";
        echo $data['merk'] . " " . $data['type'] . " " . $data['prijs'];
        echo "</a>";
        echo "<br>";
    }
    echo "</table>";
} 

catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}

?>