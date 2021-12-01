<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andmetabeli sisu näitamine</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Andmetabeli "Loomad" sisu näitamine</h1>
<?php
require("conf.php");
global $conn;
$order = $conn->prepare("select loomadID, nimi, kirjeldus from loomad");
$order->bind_result($loomadID, $nimi, $kirlejdus);
$order->execute();
echo "<table>";
echo "<tr><th>ID</th><th>Loomanimi</th><th>Kirjeldus</th><tr></tr>";
while($order->fetch()){
    echo "<tr>";
    echo "<td>$loomadID</td>";
    echo "<td>$nimi</td>";
    echo "<td>$kirlejdus</td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>