<?php
// auteur: Stacey Peters SOD1F 

    echo "<h1>Update Film</h1>";
    require_once('functions.php');


    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateFilm($_POST);
    }

    if(isset($_GET['filmid'])){

        echo "Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende filmid $_GET['filmid']
        $filmid = $_GET['filmid'];
        $row = GetFilm($filmid);

?>

<html>
    <body>
        <form method="post">
        <br>
        Filmid:<input type="" name="filmid" value="<?php echo $_GET['filmid'];?>"><br>
        Filmnaam:<input type="" name="filmnaam" value="<?php echo $row['filmnaam'];?>"><br>
        Genreid:<input type="" name="genreid" value="<?php echo $row['genreid'];?>"><br>
        Releasejaar:<input type="" name="releasejaar" value="<?php echo $row['releasejaar'];?>"><br>
        Regisseur:<input type="" name="regisseur" value="<?php echo $row['regisseur'];?>"><br>
        Landherkomst:<input type="" name="landherkomst" value="<?php echo $row['landherkomst'];?>"><br>
        Duur:<input type="" name="duur" value="<?php echo $row['duur'];?>"><br>
        
       
        <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>

<?php
   }
?>