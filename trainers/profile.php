#!/usr/local/bin/php
<? $trainerID =$_GET["trainerID"];
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');

function getTrainerData($trainerID){
    $connection = connection();
    $sql = 'SELECT T.NAME AS NAME, T.GENDER, R.NAME AS LOCATION, C.CLASS_NAME FROM TRAINERS T, TRAINER_CLASSES C, REGIONS R WHERE R.REGION_ID = T.REGION AND C.CLASS_ID = T.TRAINER_CLASS AND TRAINER_ID ='.$trainerID;
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);

    return $statement;
}

function getTrainerPokemon($trainerID){
    $connection = connection();
    $sql = 'SELECT P.IDENTIFIER, P.ID, TP.POKEMON_LEVEL, TP.POKEMON_SLOT FROM TRAINER_POKEMON TP, POKEMON P, TRAINERS T WHERE TP.SPECIES_ID = P.ID AND TP.TRAINER_ID ='.$trainerID;
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);
    return $statement;
}

function getTP($trainerID, $slot){
    $connection = connection();
    $sql = 'SELECT DISTINCT P.IDENTIFIER, P.ID, TP.POKEMON_LEVEL FROM TRAINER_POKEMON TP, POKEMON P, TRAINERS T WHERE TP.SPECIES_ID = P.ID AND TP.TRAINER_ID = '.$trainerID.' AND TP.POKEMON_SLOT ='.$slot;
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);
    return $statement;
}

function getStat($statID, $trainerID){
    $connection = connection();
    $sql = 'SELECT BASE_STAT FROM( SELECT PS.BASE_STAT FROM TRAINER_POKEMON TP, POKEMON_STATS PS WHERE TP.TRAINER_ID = '.$trainerID.' AND PS.POKEMON_ID = TP.SPECIES_ID AND PS.STAT_ID = '.$statID.' ORDER BY to_number(PS.BASE_STAT) DESC) WHERE ROWNUM = 1';
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);
    return $statement;
}

$result = getTrainerData($trainerID);
$trainer = getNext($result);
$result2 = getTrainerPokemon($trainerID);
$pokemon = getNext($result2);



$resultp1 = getTP($trainerID, 1);
$p1 = getNext($resultp1);
$resultp2 = getTP($trainerID, 2);
$p2 = getNext($resultp2);
$resultp3 = getTP($trainerID, 3);
$p3 = getNext($resultp3);
$resultp4 = getTP($trainerID, 4);
$p4 = getNext($resultp4);
$resultp5 = getTP($trainerID, 5);
$p5 = getNext($resultp5);
$resultp6 = getTP($trainerID, 6);
$p6 = getNext($resultp6);

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
<br /><br /><br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div id ="trainName" class="col-md-3">
                <? echo($trainer->NAME); ?><br />
                <IMG class="displayed" height = '300px' src=<?echo('../dbimgs/trainers/'.$trainer->NAME.'.png');?>>
                	<br /><br />
                    <div id="trainerinfo">
                    Class: <? echo($trainer->CLASS_NAME);?><br />
                    Gender: <? echo($trainer->GENDER);?><br />
                    Location: <? echo($trainer->LOCATION);?><br />
                    </div>
            </div>
		
            <div class="col-md-1"></div>
                <br />
            <div  class="col-md-6">
                <div id = "pokemon">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                            if( $p1->ID ){
                        ?>
                                <img height = '100px' src=<?echo('../dbimgs/'.$p1->ID.'.png');?>>
                             <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p1->ID);?>'> <?  echo(ucfirst($p1->IDENTIFIER));
                                echo('<br />Level'.$p1->POKEMON_LEVEL.'</a>');
                         }else{?>
                        <img height = '100px' src="../dbimgs/none.png">
                       <? } ?>

                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                        if( $p2->ID){
                            ?>
                            <img height = '100px' src=<?echo('../dbimgs/'.$p2->ID.'.png');?>>
                            <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p2->ID);?>'> <?  echo(ucfirst($p2->IDENTIFIER));
                            echo('<br />Level'.$p2->POKEMON_LEVEL.'</a>');
                        }else{?>
                            <img height = '100px' src="../dbimgs/none.png">
                        <? } ?>

                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                        if( $p3->ID){
                            ?>
                            <img height = '100px' src=<?echo('../dbimgs/'.$p3->ID.'.png');?>>
                            <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p3->ID);?>'> <?  echo(ucfirst($p3->IDENTIFIER));
                            echo('<br />Level'.$p3->POKEMON_LEVEL.'</a>');
                        }else{?>
                            <img height = '100px' src="../dbimgs/none.png">
                        <? } ?>

                    </div>
                </div>
                <br /><br />
                <div class="row">
                    <div class="col-md-1"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                        if( $p4->ID ){
                            ?>
                            <img height = '100px' src=<?echo('../dbimgs/'.$p4->ID.'.png');?>>
                        <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p4->ID);?>'> <?  echo(ucfirst($p4->IDENTIFIER));
                            echo('<br />Level'.$p4->POKEMON_LEVEL.'</a>');
                             }else{?>
                            <img height = '100px' src="../dbimgs/none.png">
                        <? } ?>

                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                        if( $p5->ID ){
                            ?>
                            <img height = '100px' src=<?echo('../dbimgs/'.$p5->ID.'.png');?>>
                        <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p5->ID);?>'> <?  echo(ucfirst($p5->IDENTIFIER));
                            echo('<br />Level'.$p5->POKEMON_LEVEL.'</a>');
                           }else{?>
                            <img height = '100px' src="../dbimgs/none.png">
                        <? } ?>

                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <?php
                        if( $p6->ID ){
                            ?>
                            <img height = '100px' src=<?echo('../dbimgs/'.$p6->ID.'.png');?>>
                        <a href='http://www.cise.ufl.edu/~jkegley/pokedex/profile.php?pokemon=<?echo($p6->ID);?>'> <?  echo(ucfirst($p6->IDENTIFIER));
                            echo('<br />Level'.$p6->POKEMON_LEVEL.'</a>');
                             }else{?>
                            <img height = '100px' src="../dbimgs/none.png">
                        <? } ?>

                    </div>
                </div>
                
                
            </div>
                <br />
                <div class="col-md-4"></div>
                <div class="col-md-1">
         <?php
         if($trainer->CLASS_NAME == "Leader"){ ?>
		Badge:
              <IMG height = '100px' src=<?echo('../dbimgs/badges/'.strtolower($trainer->NAME).'.png');?>>
            <? } ?>
                </div>
                <div class="col-md-5"></div>
                
                </div>
                
        </div>
        <div>Want to defeat this trainer's team?<br />Select a stat to see a list of Pokemon<br />with superior stats to this trainer's team.</div>
        <div>
            <?
            $results1 = getStat(1, $trainerID);
            $s1 = getNext($results1);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="1">
                <input type="hidden" name="statName" value="HP">
                <button type="submit" name="min" value="<?echo($s1->BASE_STAT);?>">HP</button>
            </form>
        </div>

        <div>
            <?
            $results2 = getStat(2, $trainerID);
            $s2 = getNext($results2);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="2">
                <input type="hidden" name="statName" value="Attack"">
                <button type="submit" name="min" value="<?echo($s2->BASE_STAT);?>">Attack</button>
            </form>
        </div>

        <div>
            <?
            $results3 = getStat(3, $trainerID);
            $s3 = getNext($results3);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="3">
                <input type="hidden" name="statName" value="Defense">
                <button type="submit" name="min" value="<?echo($s3->BASE_STAT);?>">Defense</button>
            </form>
        </div>

        <div>
            <?
            $results4 = getStat(4, $trainerID);
            $s4 = getNext($results4);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="4">
                <input type="hidden" name="statName" value="SpAttack">
                <button type="submit" name="min" value="<?echo($s4->BASE_STAT);?>">Special Attack</button>
            </form>
        </div>

        <div>
            <?
            $results5 = getStat(5, $trainerID);
            $s5 = getNext($results5);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="5">
                <input type="hidden" name="statName" value="SpDefense">
                <button type="submit" name="min" value="<?echo($s5->BASE_STAT);?>">Special Defense</button>
            </form>
        </div>

        <div>
            <?
            $results6 = getStat(6, $trainerID);
            $s6 = getNext($results6);
            ?>
            <form action="statlist.php" method="get">
                <input type="hidden" name="statID" value="6">
                <input type="hidden" name="statName" value="Speed">
                <button type="submit" name="min" value="<?echo($s6->BASE_STAT);?>">Speed</button>
            </form>
        </div>

    </div>
    
<?php
include('../header.php');
?>
</body>
</html>
    
