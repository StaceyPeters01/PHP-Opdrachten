<?php
// auteur: Stacey Peters SOD1F 
 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3dplus";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 
 function GetData($table){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 function GetFilm($filmid){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM film WHERE filmid = $filmid");
    $query->execute();
    $result = $query->fetch();

    return $result;
 }


 function OvzFilms(){

    $result = GetData("film");
    
    PrintTable($result);
    
 }



 function PrintTableTest($result){
    $table = "<table border = 1px>";
    foreach ($result as $row) {
        echo "<br> rij:";
        
        foreach ($row as  $value) {
            echo "kolom" . "$value";
        }          
        
    }
}

function PrintTable($result){
    $table = "<table border = 1px>";


    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    foreach ($result as $row) {
        
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function CrudFilm(){

    $result = GetData("film");
    
    PrintCrudFilm($result);
    
 }
function PrintCrudFilm($result){
    $table = "<table border = 1px>";

    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    foreach ($result as $row) {
        
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        
       // Wijzig button
       $table .= "<td>". 
       "<form method='post' action='update_films.php?filmid=$row[filmid]' >       
               <button name='wzg'>Wijzigen</button>	 
       </form>" . "</td>";

    //    Delete button
        $table .= "<td>". 
        "<form method='post'>       
                <button name='del' value='$row[filmid]'>Verwijderen</button>	 
        </form>" . "</td>";
        
        $table .= "</tr>";
        }
        $table.= "</table>";

    echo $table;
}


// update film database functions
function UpdateFilm($row){
    echo "Update row<br>";

    try {
        $conn = ConnectDb();


        $sql = "UPDATE film
        SET
            filmnaam = '$row[filmnaam]',
            genreid = '$row[genreid]',
            releasejaar = '$row[releasejaar]',
            regisseur = '$row[regisseur]',
            landherkomst = '$row[landherkomst]',
            duur = '$row[duur]'
        WHERE filmid = $row[filmid]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}


// delete film function
function DeleteFilm($row) {
    try {
        $conn = ConnectDb();

        $sql = "DELETE FROM film WHERE film.filmid = $row[filmid]";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->getmessage());
    }
}

// Delete film safer version using $_POST
if (isset($_POST["del"])) {
    $filmid = $_POST["del"];
    $row = GetFilm($filmid);
    DeleteFilm($row);

    echo"<script type='text/javascript'>alert('Deleted Film: $row[filmid] $row[filmnaam]');</script>";
}


function AddFilm($row){

    try {
        $conn = ConnectDb();


        $sql = "UPDATE film
        SET
            filmnaam = '$row[filmnaam]',
            genreid = '$row[genreid]',
            releasejaar = '$row[releasejaar]',
            regisseur = '$row[regisseur]',
            landherkomst = '$row[landherkomst]',
            duur = '$row[duur]'
        WHERE filmid = $row[filmid]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}

?>