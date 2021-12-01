<?php
require("conf.php");
global $conn;
if(isset($_REQUEST['nimi'])){
    $order = $conn->prepare("insert into loomad(nimi, kirjeldus) values (?, ?)");
    $order->bind_param("ss", $_REQUEST['nimi'], $_REQUEST['kirj']);//the nimi is the textbox name from the form
    $order->execute()or die(mysqli_error($conn));
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}

if(isset($_REQUEST['delete'])){
    $order = $conn->prepare("delete from loomad where loomadID=?");
    $order->bind_param("i", $_REQUEST['delete']);
    $order->execute();
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andmetabeli sisu näitamine</title>
    <link rel="stylesheet" href="./css/db.css">
</head>
<body>
<h1>Andmetabeli "Loomad" sisu näitamine</h1>
<?php
$order = $conn->prepare("select loomadID, nimi, kirjeldus from loomad");
$order->bind_result($loomadID, $nimi, $kirjeldus);
$order->execute();
echo "<table>";
echo "<tr><th>ID</th><th>Loomanimi</th><th>Kirjeldus</th><th>Tegevus</th><tr></tr>";
while($order->fetch()){
    echo "<tr>";
    echo "<td>$loomadID</td>";
    echo "<td>$nimi</td>";
    echo "<td>$kirjeldus</td>";
    echo "<td><a href='".strtok(basename($_SERVER['REQUEST_URI']), "&")."&delete=$loomadID'><input type='button' value='Kustuta'></a></td>";
    echo "</tr>";
}
?>
<form action="" method='POST'>
    <td></td>
    <td><input type="text" name="nimi" id="nimi" placeholder="Nimi..."><br></td>
    <td><input type="text" name="kirj" id="kirj" placeholder="Kirjeldus..."><br></td>
    <td><input type="submit" value="Lisa" id="submit"></td>
</form>
</table>

<?php
$conn->close();
?>
</body>
</html>