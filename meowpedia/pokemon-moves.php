#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');
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
$mID = $_POST["moveID"];
$mName = $_POST["moveName"];
?>
<h3>Pokemon who can learn <?echo($mName); ?></h3> <br /><br />

<?php

function getPokemon($mID){
    $connection = connection();

    $sql = 'SELECT DISTINCT P.IDENTIFIER, P.ID
FROM POKEMON P, POKEMON_MOVES M
WHERE P.ID = M.POKEMON_ID
      AND M.MOVE_ID ='.$mID;

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);


    return $statement;
}

$result = getPokemon($mID);
$current = getNext($result); ?>

<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Pokemon</th>
    </tr>
    </thead>

    <?
    while ( $current ){ ?>
        <tr>
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
