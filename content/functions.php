<?php
function getAge(){
    echo '<form method="post" action="">';
    echo 'Palun sinu sünnipäev<br>';
    echo '<input type="date" name="age"><br>';
    echo '<input type="submit" name="count" value="Arvuta vanus"><br>';
    echo '</form>';
    if (isset($_POST['count'])) {
        $date = $_POST['age'];
        $diff = date_diff(date_create($date), date_create('16.11.2021'));
        echo $diff->format('%y') . ' aastat vana';
    }
}

function timeUntilHolidays(){
    $date1=date_create(date("y-m-d"));
    $date2=date_create("2021-12-19");
    $diff=date_diff($date1,$date2);
    echo 'It´s ' . $diff->format('%a') .  ' until holidays';
}

function getSeason(){
    $pics = array(
        "sugis"=> "pics/sugis.jpg",
        "talv"=> "pics/talv.jpg",
        "kevad"=> "pics/kevad.jpg",
        "suvi"=> "pics/suvi.jpg"
    );
    $paev = date("z");
    $sugis_algus = date("z", strtotime("September 1"));
    $talv_algus = date("z", strtotime("Detsember 1"));
    $kevad_algus = date("z", strtotime("March 1"));
    $sugis_lopp = date("z", strtotime("November 30"));
    $talv_lopp = date("z", strtotime("February 28"));
    $kevad_lopp = date("z", strtotime("May 31"));

    if ($paev>=$sugis_algus && $paev<=$sugis_lopp) $season = "sugis";
    else if ($paev>=$talv_algus && $paev<=$talv_lopp) $season = "talv";
    else if ($paev>=$kevad_algus && $paev<=$kevad_lopp) $season = "kevad";
    else $season = "suvi";

    echo '<img src="content/'.$pics[$season].'">';
}