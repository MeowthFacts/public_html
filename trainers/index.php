#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');
include('../header.php');

function getTrainers(){
    $connection = connection();
    $sql = 'SELECT TRAINER_CLASS, TRAINER_ID, NAME, CLASS_NAME FROM TRAINERS, TRAINER_CLASSES
WHERE TRAINER_CLASS = CLASS_ID';
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);
    return $statement;
}

$result = getTrainers();
$current = getNext($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/styles.css" rel="stylesheet" media="screen">
</head>
<body>
<br /><br /><br /><br />



<table class="table">
    <thead>
    <tr>
        <th>NPC Trainer Profiles</th>
    </tr>
    </thead>
    <?
    while ( $current ){ ?>
        <tr><td>
            <form action='profile.php' method='get'>
                <button type='submit' name='trainerID' value='<?echo($current->TRAINER_ID)?>'><? echo($current->CLASS_NAME.' '.$current->NAME); ?></button>
            </form>
            </td>
        </tr>
        <?
        $current = getNext($result);
    }
    ?>
</table>

</body>
</html>