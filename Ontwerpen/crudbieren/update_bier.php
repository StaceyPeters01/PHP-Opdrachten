<?php

    echo "<h1>Update Bier</h1>";
    require_once('functions.php');


    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateBier($_POST);
    }

    if(isset($_GET['biercode'])){

        echo "Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['biercode'];
        $row = GetBier($biercode);

?>

<html>
    <body>
        <form method="post">
        <br>
        Biercode:<input type="" name="biercode" value="<?php echo $_GET['biercode'];?>"><br>
        Naam:<input type="" name="naam" value="<?php echo $row['naam'];?>"><br>
        Soort:<input type="" name="soort" value="<?php echo $row['soort'];?>"><br>
        Stijl:<input type="" name="stijl" value="<?php echo $row['stijl'];?>"><br>
        Alcohol:<input type="" name="alcohol" value="<?php echo $row['alcohol'];?>"><br>
        Brouwcode:<input type="" name="brouwcode" value="<?php echo $row['brouwcode'];?>"><br>
        
       
        <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>

<?php
   }
?>