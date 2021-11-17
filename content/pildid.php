<form method="post" action="">
    <select name="pildid">
        <option value="">Vali pilt</option>
        <?php
        $kataloog = 'pildid';
        $asukoht=opendir("content/".$kataloog);
        while($rida = readdir($asukoht)){
            if($rida!='.' && $rida!='..'){
                echo "<option value='$rida'>$rida</option>\n";
            }
        }
        ?>
    </select>
    <input type="submit" value="Random" name="action">
    <input type="submit" value="Vaata">
    <?php
    if($_POST['action'] == 'Random'){
        $files=scandir ("content/pildid");
        $files[0] = "teemo.png";
        $files[1] = "teemo.png";
        $file = array_rand($files);
        $pilt = $files[$file];
        if ($pilt == "." || $pilt == ".."){
            $pilt == 'teemo.png';
        }
    } elseif (isset($_POST['pildid'])) {
        $pilt = $_POST['pildid'];
        if ($pilt == null) {
            return;
        }
    }

    $pildi_aadress = 'content/pildid/'.$pilt;
    $pildi_andmed = getimagesize($pildi_aadress);

    $laius = $pildi_andmed[0];
    $korgus = $pildi_andmed[1];
    $formaat = $pildi_andmed[2];
    $max_laius = 120;
    $max_korgus = 90;

    if($laius <= $max_korgus && $korgus<=$max_korgus){
        $ratio = 1;
    } elseif($laius>$korgus){
        $ratio = $max_laius/$laius;
    } else {
        $ratio = $max_korgus/$korgus;
    }

    $pisi_laius = round($laius*$ratio);
    $pisi_korgus = round($korgus*$ratio);

    echo '<h3>Originaal pildi andmed</h3>';
    echo "Laius: $laius<br>";
    echo "Kõrgus: $korgus<br>";
    echo "Formaat: $formaat<br>";

    echo '<h3>Uue pildi andmed</h3>';
    echo "Arvutamse suhe: $ratio <br>";
    echo "Laius: $pisi_laius<br>";
    echo "Kõrgus: $pisi_korgus<br>";
    echo "<img width='$pisi_laius' src='$pildi_aadress' alt='pilt'><br>"; ?>
</form>

