<form method="post">
    <p>Bedrag is exclusief BTW<input type="text" name="bedrag" value="100"></p>
    <input type="radio" name="btw" value="negen">Laag, 9 %
    <input type="radio" name="btw" value="eenentwintig">Hoog, 21 %
    <p><input type="submit" name="omzetten" value="Omzetten"></p>
</form>

<?php

if (isset($_POST['btw'])){
    $btw = $_POST['btw'];
    $bedrag = $_POST['bedrag'];

    if($btw == "negen"){
        $som = $bedrag / 100 * 109;
        echo "Bedrag inclusief 9% BTW : &euro; $som,-";
    }else if($btw == "eenentwintig"){
        $som = $bedrag / 100 * 121;
        echo "Bedrag inclusief 21% BTW : &euro; $som,-";
    }
}

?>