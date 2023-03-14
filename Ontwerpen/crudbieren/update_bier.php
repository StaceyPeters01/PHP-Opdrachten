<?php

    require_once('functions.php');
    echo "<h1>Update Bier</h1>";

    echo "Data uit het vorige formulier:<br>";
   // Haal alle info van de betreffende biercode $_GET['biercode']
   
   ?>

<html>
    <body>
        <form method="post" action='test.php'>
        <br>
        Biercode:<input type="" name="biercode" value="<?php echo $_GET['biercode'];?>"><br>
        
       
        <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>