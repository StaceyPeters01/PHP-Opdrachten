<?php

    echo "<h1>Add Bier</h1>";
    require_once('functions.php');

 if isset()
 
?>

<html>
    <body>
        <form method="post">
        <br>
        Biercode:<input type="" name="biercode" value=""><br>
        Naam:<input type="" name="naam" value=""><br>
        Soort:<input type="" name="soort" value=""><br>
        Stijl:<input type="" name="stijl" value=""><br>
        Alcohol:<input type="" name="alcohol" value=""><br>

        <?php
            dropDown('brouwcode', GetData('brouwer'));
        ?>
        
       
        <input type="submit" name="ins" value="Insert"><br>
        </form>
    </body>
</html>