<?php
require("conf.php");
session_start();
if(!isset($_SESSION['tuvastamine'])) {
    header('Location: ./loginAB.php');
    exit();
}
global $conn;
if(isset($_REQUEST['loomatyyp'])){
    if(!empty($_REQUEST['loomatyyp'])){
        $order = $conn->prepare("insert into loomatyyp(loomatyyp) values (?)");
        $order->bind_param("s", $_REQUEST['loomatyyp']);//the nimi is the textbox name from the form
        $order->execute()or die(mysqli_error($conn));
    } else echo "Invalid loomatyyp.";
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}

if(isset($_REQUEST['delete']) && $_SESSION['isAdmin'] == 1){
    $order = $conn->prepare("delete from loomatyyp where loomatyypID=?");
    $order->bind_param("i", $_REQUEST['delete']);
    $order->execute();
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}

if(isset($_REQUEST['loomchange']) && $_SESSION['isAdmin'] == 1){
    $order=$conn->prepare("UPDATE loomatyyp SET loomatyyp=? where loomatyypID=?");
    $order->bind_param("si",$_REQUEST['loomatyypN'], $_REQUEST['id']);
    $order->execute();
    header("Location: ".$_SERVER["PHP_SELF"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andmetabeli sisu näitamine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db.css">
</head>
<body>
<div>
    Currently logged as: <?php echo $_SESSION['username']?>
    <form action="./logout.php" method="POST">
        <input type="submit" value="Logi välja" name="logout">
    </form>
</div>
<h1>Andmetabeli "Loomatyyp" sisu näitamine</h1>
<?php
require("conf.php");
global $conn;
$order = $conn->prepare("select loomatyypID, loomatyyp from loomatyyp");
$order->bind_result($loomatyypID, $loomatyyp);
$order->execute();
echo "<table class='loomatyypTable'>";
echo "<tr><th>ID</th><th>loomatyyp</th><th>Tegevus</th><tr></tr>";
while($order->fetch()){
    echo "<tr>";
    echo "<td>$loomatyypID</td>";
    if(isset($_REQUEST['edit'])){
        if ($_REQUEST['edit'] == $loomatyypID){
            echo "<td><form action='' method='post'>
                <input type='hidden' name='loomchange' value='yes'>
                <input type='hidden' value='$loomatyypID' name='id'>
                <input type='text' placeholder='uus...' name='loomatyypN' value='$loomatyyp'>
                <input type='submit' value='Save'>
                </form></td>";
        } else echo "<td>$loomatyyp</td>";
    } else echo "<td>$loomatyyp</td>";
    if($_SESSION['isAdmin'] == 1){
        echo "<td><a href='$_SERVER[PHP_SELF]?delete=$loomatyypID'><input type='button' value='Kustuta'></a></td>";
        echo "<td><a href='$_SERVER[PHP_SELF]?edit=$loomatyypID'><input type='button' value='Muuda'></a></td>";
    }
    echo "</tr>";
}
echo "</table>";
if($_SESSION['isAdmin'] == 1){
    echo '
<form action="" method="POST">
    <td></td>
    <td><input type="text" name="loomatyyp" id="loomatyyp" placeholder="Loomatyyp..."><br></td>
    <td><input type="submit" value="Lisa" id="submit"></td>
</form>
</table>';
}
?>

</body>
</html>