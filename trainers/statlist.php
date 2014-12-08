#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');

function getSuperiorPokemon($statID, $min){
    $connection = connection();

    $sql = 'SELECT PS.BASE_STAT, P.IDENTIFIER, P.ID FROM POKEMON P, POKEMON_STATS PS WHERE PS.POKEMON_ID = P.ID AND PS.STAT_ID = '.$statID.' AND PS.BASE_STAT > '.$min.' ORDER BY to_number(BASE_STAT) DESC';

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);

    return $statement;
}

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
<body class="meowped">
<br /><br /><br /><br />

<?
$statID = $_GET["statID"];
$statName = $_GET["statName"];
$min = $_GET["min"];

$result = getSuperiorPokemon($statID, $min);
$current = getNext($result);
?>

<h3>Pokemon with <?echo($statName); ?> greater than <?echo($min); ?>. </h3>
<br /><br />

<table class="table">
    <thead>
    <tr>
        <th><?echo($statName);?></th>
        <th>#ID</th>
        <th>Pokemon</th>
    </tr>
    </thead>

    <?
    while ( $current ){ ?>
        <tr>
            <td><? echo($current->BASE_STAT); ?></td>
            <td><? echo($current->ID); ?> </td>
            <td><a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($current->ID);?>'><? echo(ucwords($current->IDENTIFIER)); ?></a> </td>
        </tr>
        <?
        $current = getNext($result);
    }
    ?>
</table>

<?php
include('../header.php');
?>

</body>
</html>