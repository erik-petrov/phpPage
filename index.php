<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrov PHP leht</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="js/drawing.js"></script>
    <script src="js/drag.js"></script>
    <script src="js/calc1.js"></script>
    <link rel="stylesheet" href="./css/puzzle.css">
    <link rel="stylesheet" href="./css/calc.css">
</head>
<body>
<?php
    include('header.php');
    include('nav.php')
?>
<main>
    <?php
        if (isset($_GET['leht'])){
            include('content/'.$_GET['leht'].'.php');
        } else {
            include('content/_main.php');
        }
    ?>
</main>
<?php
    include('footer.php')
?>
</body>
</html>