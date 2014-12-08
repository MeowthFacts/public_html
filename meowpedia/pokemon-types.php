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
$typeID = $_GET["typeID"];
$typeName = $_GET["typeName"];
?>

<h1>Pokemon of the <?echo($typeName); ?> Type</h1> <br /><br />

<?php

function getPokemon($typeID){
    $connection = connection();

    $sql = 'SELECT P.IDENTIFIER, P.ID
FROM POKEMON P, POKEMON_TYPES T
WHERE P.ID = T.POKEMON_ID
AND T.TYPE_ID ='.$typeID;

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);


    return $statement;
}

$result = getPokemon($typeID);
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

    <?php
    include('../header.php');
    ?>

</body>
</html>