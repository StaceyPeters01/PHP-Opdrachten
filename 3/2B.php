<?php
$datum= date("j F Y");
echo "Het is vandaag $datum<br><br>";

$vandaag= date("zS");
echo "Het is vandaag de $vandaag dag<br><br>";

$dag= date("l");
$weekdag= date("N");
echo "$dag is dag $weekdag in de week<br><br>";

$maand= date("F");
$maanddagen= date("t");
echo "$maand heeft $maanddagen dagen<br><br>";

// Schrikkeljaar?

$jaar= date("Y");

$leap= date("L");

if($leap= 0)
{
    echo "Het jaar $jaar is een schrikkeljaar.";
}
else{
    echo "Het jaar $jaar is geen schrikkeljaar.";
}

?>