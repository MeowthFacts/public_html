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
<h1>Abilities</h1>

<?php

function getAbilities(){
    $connection = connection();
    $sql = 'SELECT IDENTIFIER, ID FROM ABILITIES';

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);


    return $statement;
}

$result = getAbilities();
$current = getNext($result);

?>


<table>
    <thead>
    <tr>
        <th class="moveTableCell">Ability</th>
    </tr>
    </thead>


    <?
    while ( $current ){ ?>
        <tr>
            <td><br />
                <form action='pokemon-abilities.php' method='get'>
                    <input type='hidden' name='abilityID' value ='<? echo($current->ID); ?>'>
                    <button class="meowpediaButton" type="submit" name="abilityName" value="<? echo(ucfirst($current->IDENTIFIER)); ?>"><? echo(ucfirst($current->IDENTIFIER)); ?></button>
                </form>
            </td>
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