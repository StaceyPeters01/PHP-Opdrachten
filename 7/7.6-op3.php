<form method="post">
<input class="nostyle" type="radio" name="kleur" value="rood"> Rood
<input class="nostyle" type="radio" name="kleur" value="groen"> Groen
<input class="nostyle" type="radio" name="kleur" value="blauw"> Blauw
<input class="nostyle" type="radio" name="kleur" value="roze"> Roze
<input type="submit" name="instellen" value="instellen">
</form>

<?php

if(isset($_POST['kleur'])){
    $kleur = $_POST['kleur'];

    if($kleur == "rood"){
        echo"<style>body{background-color: red;}</style>";
    }else if($kleur == "groen"){
        echo"<style>body{background-color: green;}</style>";
    }else if($kleur == "blauw"){
        echo"<style>body{background-color: blue;}</style>";
    }else if($kleur == "roze"){
        echo"<style>body{background-color: pink;}</style>";
    }
}

?>