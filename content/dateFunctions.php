<h1>Kuupäeva funktsioonid</h1>
<ol>
    <li>time</li>
    <li>date</li>
    <li>mktime</li>
    <li>strtotime</li>
    <li>date_default_timezone_set</li>
</ol>
<h2>Ülesanded</h2>
<section>
    <h3>Kuuüpäev ja aeg formaadis MM.DD.YYYY hh.mm</h3>
    <?php
    echo date("m.d.y h.i")
    ?>
</section>
<section>
    <h3>Kasutaja vanus 16.11.2021</h3>
    <?php
    include("functions.php");
    getAge();
    ?>
</section>
<section>
    <h3>Aeg kuni vabaaja</h3>
    <?php
    timeUntilHolidays();
    ?>
    <h3>2022 uue aastani on </h3>
    <?php
    $year = date('Y');
    $last_day = strtotime('last day of December');
    $today = strtotime('now');
    $diff = $last_day - $today;
    echo $year.' aasta lõpuni '. floor($diff/(60*60*24)) . ' päeva'
    ?>
</section>
<section>
    <h3>Hooaeg</h3>
    <?php
    getSeason();
    ?>
</section>
