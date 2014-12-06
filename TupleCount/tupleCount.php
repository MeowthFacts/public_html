#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');

function getData($tableName){
    $connection = connection();
    $sql = 'SELECT COUNT(*) AS COUNT FROM '.$tableName;
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);

    return $statement;
}
$count = 0;
$count1;
$tableArray =array("ABILITIES","EGG_GROUPS","MOVE_CATEGORIES","MOVES","POKEMON","POKEMON_ABILITIES","POKEMON_EGG_GROUPS","POKEMON_MOVES","POKEMON_STATS","POKEMON_TYPES","REGIONS","TRAINER_CLASSES","TRAINER_POKEMON","TRAINERS","TYPE_NAMES");
for($i = 0; $i <= 14; ++$i){
    echo "Number of tuples in table ".$tableArray[$i]." is: ";
	
    $cats = getData($tableArray[$i]);
    $dogs = getNext($cats);
    $count += $dogs->COUNT;
    $count1 = $dogs->COUNT;
    echo($count1);
echo "<br>";
}
echo "Total Number of Tuples is: ";
echo($count);


?>
<!DOCTYPE html>
<html>
<head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/styles.css" rel="stylesheet" media="screen">
</head>
<body>

</body>
</html>