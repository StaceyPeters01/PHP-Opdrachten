<?php
// Opdracht 15: Poll

function ConnectDB() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=poll", "root", "");
        $query = $db->prepare("SELECT vraag FROM poll");
        $query->execute();
        $poll = $query->fetchAll(PDO::FETCH_ASSOC);
        return $poll;
    } 
    catch (PDOException $e) {
        die("ERROR : " . $e->getMessage());
    }
}

function Poll() {
    echo "<form method='POST'>";
    // option1
    echo "<input type='radio' name='optie' value='1' checked>";
    echo "<label for='optie_1'>Inderdaad, PHP is het helemaal.</label>", "<br>";
    // option2
    echo "<input type='radio' name='optie' value='2'>";
    echo "<label for='optie_2'>PHP is leuk, maar niet het leukste.</label>", "<br>";
    // option3
    echo "<input type='radio' name='optie' value='3'>";
    echo "<label for='optie_3'>PHP is saai.</label>", "<br>";
    // option4
    echo "<input type='radio' name='optie' value='4'>";
    echo "<label for='optie_4'>Geen mening.</label>", "<br>";
    // submitbtn
    echo "<input type='submit' value='Inleveren' name='submit_btn'>";
    echo "</form>";
}

function GetOptie() {
    if (isset($_POST["optie"])) {
        return $_POST["optie"];
    }
}

function SubmitVote() {
    if (isset($_POST["submit_btn"])) {
        $antwoord_id = GetOptie();
        try {
            $db = new PDO("mysql:host=localhost;dbname=poll", "root", "");
            $queryupdate = $db->prepare("UPDATE optie SET stemmen = stemmen + 1 WHERE id = $antwoord_id");
            $queryupdate->execute();
            echo "Uw stem is toegevoegd!";
        }
        catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}

$poll = ConnectDB();

foreach ($poll as $data){
    echo $data["vraag"];
    echo "<br><br>";
}

Poll();

SubmitVote();

?>
