#!/usr/local/bin/php
<!DOCTYPE html>

<?php
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');

function getNamesIDs(){
    $connection = connection();

    $sql = 'SELECT ID, IDENTIFIER FROM POKEMON';

    $statement = oci_parse($connection, $sql);
    oci_execute($statement);
    return $statement;
}

$list = getNamesIDs();
$current = getNext($list);
?>

<html>
<head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/styles.css" rel="stylesheet" media="screen">
</head>
<body>
<br /><br />
<br /><br />

<div class="container">
    <div class="row">
        <div class="col-*-*"></div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Pokemon 1</legend>

                    <!-- Select Basic -->
                    <div class="control-group">
                        <label class="control-label" for="selectbasic"></label>
                        <div class="controls">
                            <select id="selectbasic" name="selectbasic" class="input-medium">
                                <option>-Choose Pokemon 1-</option>
                                <?php while ( $current ){ ?>
                                    <option><? echo(ucwords($current->IDENTIFIER)); ?></option>
                                <? $current = getNext($list); }?>

                            </select>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="col-xs-6">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Pokemon 2</legend>

                    <!-- Select Basic -->
                    <div class="control-group">
                        <label class="control-label" for="selectbasic"></label>
                        <div class="controls">
                            <select id="selectbasic" name="selectbasic" class="input-medium">
                                <option>-Choose Pokemon 2-</option>
                                <?php
                                $list = getNamesIDs();
                                $current = getNext($list);
                                while ( $current ){ ?>
                                    <option><? echo(ucwords($current->IDENTIFIER)); ?></option>
                                    <? $current = getNext($list); }?>
                            </select>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php
include('../header.php');
?>
</body>
</html>
