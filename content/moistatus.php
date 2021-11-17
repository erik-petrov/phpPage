<?php
echo "<h1>Matemaatika tehed. Mõistatus</h1>";
echo "<section>";
echo "<h2>Arva ära kaks arvu</h2>";
$num1 = 5;
$num2 = 8;
//adding 2 nums
echo "Kui liidame kokku, vastus on ".($num1+$num2);
echo "<br>Kui teisest arvust lahutada esimene, siis vastus on -".abs($num1-$num2);
echo "<br>Kahe arvude korrutis ".$num1*$num2;
echo "<br>Kui esimene arv jagame teise arvuga, siis vastus on ".($num1/$num2);
echo "<br>Esimene arv ruudus ".pow($num1, 2);
echo "<br>Teine arv ruudus ".pow($num2, 2);
echo "<br> <a href='../../phpphpphp/harjutused/vastus.php'>Õige vastus</a>";
echo "</section>";
echo "<section>";
echo "<br><h2>Arva ära Eesti Linnanimi</h2>";
$linn = "Tallinn";
echo "See linnanimi pikkus on ".strlen($linn);
echo "<br>See linnanimi esimene täht on ".substr($linn,0,1);
echo "<br>See segatud linnanimi on ".str_shuffle(strtolower($linn));
echo "<br>See linnanimi krüpteeritud on ".str_rot13($linn);
echo "<br> <a href='../../phpphpphp/harjutused/vastusLinn.php'>Õige vastus</a>";
echo "</section>";
?>
