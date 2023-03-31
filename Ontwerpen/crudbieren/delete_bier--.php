<?php
    require_once('functions.php');


    if(isset($_POST) && isset($_POST['dlt'])){
        DeleteBier();
    }

    if(isset($_GET['biercode'])){
        // Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['biercode'];
        $row = GetBier($biercode);
        echo"<script type='text/javascript'>alert('Bier $row[biercode] $row[naam] is verwijderd.');window.location.href='crud_bieren.php';</script>";
    }
?>