<?php
    require_once('functions.php');

    if(isset($_GET['biercode'])){
        $biercode = $_GET['biercode'];
        $row = GetBier($biercode);
        DeleteBier($row);

        echo"<script type='text/javascript'>alert('Bier $row[biercode] $row[naam] is verwijderd.');window.location.href='crud_bieren.php';</script>";
    }

?>