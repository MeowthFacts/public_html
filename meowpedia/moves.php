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
    <h1>Moves</h1>

    <?php

    function getMoves(){
        $connection = connection();
        $sql = 'SELECT M.ID, M.IDENTIFIER, M.TYPE_ID, M.POWER, M.PP, M.ACCURACY, T.NAME, C.CAT FROM TYPE_NAMES T, MOVES M, MOVE_CATEGORIES C WHERE C.CAT_ID = M.DAMAGE_CLASS_ID AND T.TYPE_ID = M.TYPE_ID';

        $statement = oci_parse($connection, $sql);
        oci_execute($statement);


        return $statement;
    }

    $result = getMoves();
    $current = getNext($result);
    ?>


    <table>
        <thead>
        <tr>
            <th class="moveTableCell">Move</th>
            <th class="moveTableCell">Type</th>
            <th class="moveTableCell">Category</th>
            <th class="moveTableCell">PP</th>
            <th class="moveTableCell">Accuracy</th>
            <th>Power</th>
        </tr>
        </thead>


        <?
        while ( $current ){ ?>
            <tr>
                <td> <br />
                    <form action='pokemon-moves.php' method='post'>
                        <input type='hidden' name='moveID' value ='<? echo($current->ID); ?>'>
                      <button class="meowpediaButton" type="submit" name="moveName" value="<? echo(ucfirst($current->IDENTIFIER)); ?>"><? echo(ucfirst($current->IDENTIFIER)); ?></button>
                    </form>
                </td>
                <td><? echo($current->NAME); ?> </td>
                <td><? echo($current->CAT); ?> </td>
                <td><? echo($current->PP); ?> </td>
                <td><? echo($current->ACCURACY); ?> </td>
                <td><? echo($current->POWER); ?> </td>
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