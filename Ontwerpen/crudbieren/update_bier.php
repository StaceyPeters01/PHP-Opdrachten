<?php

    require_once('functions.php');
    echo "<h1>Update Bier</h1>";

    echo "Data uit het vorige formulier:<br>";
   // Haal alle info van de betreffende biercode $_GET['biercode']
   $biercode = $_GET['biercode'];
   GetBier($biercode);
   ?>

<html>
    <body>
        <form method="post">
        <br>
        Biercode:<input type="" name="biercode" value="<?php echo $_GET['biercode'];?>"><br>
        Naam:<input type="" name="naam" value="<?php echo $row['naam'];?>"><br>
        Soort:<input type="" name="soort" value="Soort"><br>
        Stijl:<input type="" name="stijl" value="Stijl"><br>
        Alcohol:<input type="" name="alcohol" value="Alcohol"><br><br>
        
       
        <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>