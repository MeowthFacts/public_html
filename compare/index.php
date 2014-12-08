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

<div id ="compcont" class="container">
    <div class="row">
        <div class="col-*-*"></div>
    </div>
    <div id ="comparer" class="row">
        <div id="conty" class="col-xs-6">
            <form id="lol3" class="form-horizontal">
                <fieldset id="lol4">

                    <!-- Form Name -->
                    <legend>Pokemon 1</legend>

                    <!-- Select Basic -->
                    <div id="lol1" class="control-group">
                        <label class="control-label" for="selectbasic"></label>
                        <div id = "lol2" class="controls">
                            <select id="selectbasic" name="selectbasic" class="input-medium" onchange="update1(this.value)">
                                <option>-Choose Pokemon 1-</option>
                                <?php while ( $current ){ ?>
                                    <option value="<? echo(ucwords($current->ID)); ?>"><? echo(ucwords($current->IDENTIFIER)); ?></option>
                                <? $current = getNext($list); }?>

                            </select>

                            <br /><iframe id="frame1" frameBorder = "0" src="http://www.cise.ufl.edu/~jkegley/pokedex/profile1.php?pokemon=1"></iframe>

                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <div id="conty" class="col-xs-6">
            <form id="lol3" class="form-horizontal">
                <fieldset id ="lol4">

                    <!-- Form Name -->
                    <legend>Pokemon 2</legend>

                    <!-- Select Basic -->
                    <div id="lol1" class="control-group">
                        <label class="control-label" for="selectbasic"></label>
                        <div id = "lol2" class="controls">
                            <select id="selectbasic" name="selectbasic" class="input-medium" onchange="update2(this.value)">
                                <option>-Choose Pokemon 2-</option>
                                <?php
                                $list = getNamesIDs();
                                $current = getNext($list);
                                while ( $current ){ ?>
                                    <option value="<? echo(ucwords($current->ID)); ?>"><? echo(ucwords($current->IDENTIFIER)); ?></option>
                                    <? $current = getNext($list); }?>
                            </select>
			    <br /><iframe id="frame2" frameBorder = "0" src="http://www.cise.ufl.edu/~jkegley/pokedex/profile1.php?pokemon=1"></iframe>

                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

</div>

<script>
    function update1(thing){

        var iframe = document.getElementById("frame1");
        iframe.src = "http://www.cise.ufl.edu/~jkegley/pokedex/profile1.php?pokemon=" + thing;
        //var src1 = "http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=" + thing + "/#pokeandtype";
        //iframe.src = src1;
    }
    function update2(thing){
        var iframe = document.getElementById("frame2");
        iframe.src = "http://www.cise.ufl.edu/~jkegley/pokedex/profile1.php?pokemon=" + thing;
    }
</script>
<?php
include('../header.php');
?>
</body>
</html>
