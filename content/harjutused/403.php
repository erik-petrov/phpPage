<a href="../../index.php?leht=test">--------------Tagasi--------------</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ülesanne 403</title>
</head>
<body>
<h1>Ülesanne 403 - Värvid</h1>
<?php
$varvid=array("Indigo", "ForestGreen", "DarkCyan", "Crimson", "Aquamarine",
    "LemonChiffon", "MediumSpringGreen", "SteelBlue", "RebeccaPurple",
    "PaleGoldenRod", "LightSeaGreen", "HoneyDew", "DeepSkyBlue", "DarkOliveGreen", "DarkGreen");
foreach ($varvid as &$i) {
    echo "<span style='color: $i'> Värvi nimi: $i<br>";
}
?>
