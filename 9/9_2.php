<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $query=$db->prepare("SELECT * FROM fietsen WHERE id = " . $_GET['id']);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    foreach($result as $data){
        echo "Artikelnummer: " . $data['id'] . "<br>";
        echo "Merk: " . $data['merk'] . "<br>";
        echo "Prijs: &euro;" . number_format($data['prijs'],2,',','.') . "<br><br>";
    }

    echo "</table>";
}

catch(PDOException $e){
    die("Error!: " . $e->message());
}

?>
<a href="9_1.php">Terug naar de homepage</a>
</html>