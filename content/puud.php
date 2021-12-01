<?php
require("conf.php");
session_start();
if(!isset($_SESSION['tuvastamine'])) {
    header('Location: ./loginAB.php');
    exit();
}
global $conn;
if(isset($_REQUEST['treeform'])){
    if(!empty($_REQUEST['nimi']) && !empty($_REQUEST['link'])){
        $order = $conn->prepare("insert into trees(nimi, link) values (?, ?)");
        $order->bind_param("ss", $_REQUEST['nimi'], $_REQUEST['link']);//the nimi is the textbox name from the form
        $order->execute()or die(mysqli_error($conn));
    } else echo "Invalid tree name or link.";
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}

if(isset($_REQUEST['delete']) && $_SESSION['isAdmin'] == 1){
    $order = $conn->prepare("delete from trees where treesID=?");
    $order->bind_param("i", $_REQUEST['delete']);
    $order->execute();
    //header("Location: ".basename($_SERVER['REQUEST_URI']));
}

if(isset($_REQUEST['change']) && $_SESSION['isAdmin'] == 1){
    $order=$conn->prepare("UPDATE trees SET nimi=?, link=? where treesID=?");
    $order->bind_param("ssi",$_REQUEST['nimi'], $_REQUEST['link'],$_REQUEST['change']);
    $order->execute();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andmetabeli sisu näitamine</title>
    <link rel="stylesheet" href="../css/db.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Puud</h1>

<?php
$order = $conn->prepare("select treesID, nimi, link from trees");
$order->bind_result($treesID, $nimi, $link);
$order->execute();
?>
<div>
    Currently logged as: <?php echo $_SESSION['username']?>
    <form action="./logout.php" method="POST">
        <input type="submit" value="Logi välja" name="logout">
    </form>
</div>
<div class="leftcolumn">
    <h2>Puud</h2>
    <?php
    echo "<ul>";
    while($order->fetch()){
        echo "<li><a href='?id=".$treesID."'>".$nimi."</a></li>";
    }
    echo "</ul>";
    echo "<a href='?lisa'>Lisa</a>";
    if(isset($_REQUEST['lisa'])){
        ?>
        <form action="" method='POST'>
            <input type="hidden" name="treeform" value="yes">
            <label for="nimi">Nimi</label><br>
            <input type="text" name="nimi" id="nimi"><br>
            <label for="link">Link</label><br>
            <textarea name="link" id="link"></textarea><br>
            <input type="submit" value="Lisa" id="submit">
        </form>
    <?php } ?>
</div>
<div class="rightcolumn">
    <?php
    if(isset($_REQUEST['id'])){
        $order=$conn->prepare("SELECT treesID, nimi, link FROM trees where treesID=?");
        $order->bind_param('i',$_REQUEST['id']);
        $order->bind_result($treesID, $nimi, $link);
        $order->execute();


        if ($order->fetch()){
            if(isset($_REQUEST['edit'])){
                echo"
              <form action='$_SERVER[PHP_SELF]'>
               <input type='hidden' name='change' value='$treesID'>
                 <h2>Puu andmete muutmine</h2>
            <input type='text' name='nimi' value='$nimi'>
            Puunimi:
            <textarea name='link' value='$link'></textarea>
            <br>
            Pilt(peab olema pildilingi aadress)
            <input type='submit' value='change'>         
            </form>
              ";
            } else{


                echo "<strong>".$nimi."</strong>";
                echo "<img src='$link' alt='pilt' width='100%' height='100%'>";
                echo "<br>";
                if($_SESSION['isAdmin'] == 1){
                    echo "<a href='$_SERVER[PHP_SELF]?delete=$treesID'>Kustuta</a>";
                    echo "<br>";
                    echo "<a href='$_SERVER[PHP_SELF]?id=".$treesID."&edit=$treesID'>Muuda</a>";
                }
            }}else{
            echo "Viga";
        }

    }
    $conn->close();
    ?>
</div>
</body>
</html>