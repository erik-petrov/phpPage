<a href="../../index.php?leht=test">--------------Tagasi--------------</a>
<?php
$data = array(
    "nimi" => "Erik Petrov",
    "address" => "Vilde tee 69 420",
    "pilt" => "imgs/amogus.png",
    "koduleht" => "https://petrov20.thkit.ee/php"
);
?>
<h1>Ülesanne 401 / Associative array</h1>
<p><b><?=$data["nimi"]?></b></p>
<p><i><?=$data["address"]?></i></p>
<img src="<?=$data["pilt"]?>" alt="amogus"><br>
<a href="<?=$data["koduleht"]?>" target="_blank">Koduleht</a>
<p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<h1>Ülesanne 401 / Indexed array</h1>
<?php
$dataIndex = array("Erik Petrov", "Vilde tee 69", "imgs/amogus.png", "https://petrov20.thkit.ee/php");
echo "<b>Nimi: ".$dataIndex[0]."</b><br>";
echo "<i>Nimi: ".$dataIndex[1]."</i><br>";
echo "<img src='$dataIndex[2]' alt='amogus'><br>";
echo "<a href='$dataIndex[3]'>Koduleht</a><br>";
?>


