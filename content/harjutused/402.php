<a href="../../index.php?leht=test">--------------Tagasi--------------</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ülesanne 402</title>
</head>
<body>
<h1>Ülesanne 402</h1>
<?php
for($i = 0; $i<21; $i++){
    echo "<br><input type='checkbox' name='box' id='$i' value='$i'>";
    echo "<label for='$i'> box $i</label>";
}
for($i = 0; $i<21; $i++){
    echo "<br><input type='text' id='l$i'>";
    echo "<label for='l$i' >$i</label>";
}
for($i = 0; $i<21; $i++){
    echo "<br><input type='radio' name='rad' id='radio.$i' value='$i'>";
    echo "<label for='radio.$i'> radio $i</label>";
}
?>
</body>
</html>
