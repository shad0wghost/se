<?php
require('../class/db.class.php');
require('../sql.php');
$DB = new DB($config);

//$DB->Query("SELECT COUNT(name) as count FROM teams where name = '$teamname'");
//$numteams = $DB->Get('count');
//$currteam = $_GET['team'];

$DB->Query("SELECT * from services WHERE active = 1 ORDER BY `name`,`poller`");
$results = $DB->Get();
?>
<div class="heading">Cal Poly Pomona CCDC Scoring Engine v. 2.50<br> <?php echo date("F j, Y, g:i:s a");?></div>
<div class="row">
    <div class="block">
        <div class="block_center">Service</div>
    </div>
    <div class="block">
        <div class="block_center">Attempts</div>
    </div>
    <div class="block">
        <div class="block_center">Successful</div>
    </div>
    <div class="block">
        <div class="block_center">Uptime</div>
    </div>
</div>

<?php foreach ($results as $row) {

    if ($row['lastcheck'] == 1) {
        $class = 'up';
    } else {
        $class = 'down';
    }
    ?>
<div class="row">
    <div class="block <?php echo $class ?>">
        <div class="block_center">
            <?php echo $row['name'] . " - " . $row['hostname'] . ":" . $row['poller'] ?>
        </div>
    </div>
    <div class="block">
        <div class="block_center">
            <?php echo $row['attempts'] ?>
        </div>
    </div>
    <div class="block">
        <div class="block_center">
            <?php echo $row['success'] ?>
        </div>
    </div>

    <div class="block">
        <div class="block_center">
            <?php echo round(($row['success'] / $row['attempts'] * 100), 1) ?>%
        </div>
    </div>
</div>
<?php } ?>
<?php
//print_r_html($results);
?>
