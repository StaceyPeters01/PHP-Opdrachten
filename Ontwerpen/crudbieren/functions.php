<?php
// made by: Stacey Peters

 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
   
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
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 function GetBier($biercode){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM bier WHERE biercode = $biercode");
    $query->execute();
    $result = $query->fetch();

    return $result;
 }


 function OvzBieren(){

    // Haal alle bier record uit de tabel 
    $result = GetData("bier");
    
    //print table
    PrintTable($result);
    //PrintTableTest($result);
    
 }

 function OvzBrouwers(){
    // Haal alle bier record uit de tabel 
    $result = GetData("brouwer");
    
    //print table
    PrintTable($result);
     
 }

 function PrintTableTest($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";
    // print elke rij
    foreach ($result as $row) {
        echo "<br> rij:";
        
        foreach ($row as  $value) {
            echo "kolom" . "$value";
        }          
        
    }
}

// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function CrudBieren(){

    // Haal alle bier record uit de tabel 
    $result = GetData("bier");
    
    //print table
    PrintCrudBier($result);
    
 }
function PrintCrudBier($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        // $table .= "</tr>";
        
       // Wijzig button
       $table .= "<td>". 
       "<form method='post' action='update_bier.php?biercode=$row[biercode]' >       
               <button name='wzg'>Wijzigen</button>	 
       </form>" . "</td>";

    //    Delete button
        $table .= "<td>". 
        "<form method='post'>       
                <button name='del' value='$row[biercode]'>Verwijderen</button>	 
        </form>" . "</td>";
        
        $table .= "</tr>";
        }
        $table.= "</table>";

    echo $table;
}


// update bier database functions
function UpdateBier($row){
    echo "Update row<br>";

    try {
        $conn = ConnectDb();


        $sql = "UPDATE bier
        SET
            naam = '$row[naam]',
            soort = '$row[soort]',
            stijl = '$row[stijl]',
            alcohol = '$row[alcohol]',
            brouwcode = '$row[brouwcode]'
        WHERE biercode = $row[biercode]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}


// delete bier function
function DeleteBier($row) {
    try {
        $conn = ConnectDb();

        $sql = "DELETE FROM bier WHERE `bier`.`biercode` = $row[biercode]";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->getmessage());
    }
}

// Delete bier safer version using $_POST
if (isset($_POST["del"])) {
    $biercode = $_POST["del"];
    $row = GetBier($biercode);
    DeleteBier($row);

    echo"<script type='text/javascript'>alert('Deleted Bier: $row[biercode] $row[naam]');</script>";
}

function dropDown($label, $data){

    $txt = "
    <label for='$label'>Kies een $label:</label>
    <select name='$label' id='$label'>";

    foreach($data as $row){
        $txt .= "<option value='$row[brouwcode]'>$row[naam]</option>";
    }

    $txt .= "</select>";

    echo $txt;
}

function AddBier($row){
    // echo "Update row<br>";

    try {
        $conn = ConnectDb();


        $sql = "INSERT bier
        SET
            naam = '$row[naam]',
            soort = '$row[soort]',
            stijl = '$row[stijl]',
            alcohol = '$row[alcohol]',
            brouwcode = '$row[brouwcode]'
        WHERE biercode = $row[biercode]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}

?>