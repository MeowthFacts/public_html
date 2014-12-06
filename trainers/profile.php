#!/usr/local/bin/php
<? $trainerID =$_POST["trainerID"];
include('../phpfuncts/connection.php');
include('../phpfuncts/getNext.php');

function getTrainerData($trainerID){
    $connection = connection();
    $sql = 'SELECT T.NAME AS NAME, T.GENDER, R.NAME AS LOCATION, C.CLASS_NAME FROM TRAINERS T, TRAINER_CLASSES C, REGIONS R WHERE R.REGION_ID = T.REGION AND C.CLASS_ID = T.TRAINER_CLASS AND TRAINER_ID ='.$trainerID;
    $statement = oci_parse($connection, $sql);
    oci_execute($statement);

    return $statement;
}


$result = getTrainerData($trainerID);
$trainer = getNext($result);
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
                <? echo($trainer->NAME);?><br />
		
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
                        <img height = '100px' src="../dbimgs/none.png">
                        Pikachu
                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <img height = '100px' src="images/pikachu.png">
                        Pikachu
                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <img height = '100px' src="images/pikachu.png"> 
                        Pikachu
                    </div>
                </div>
                <br /><br />
                <div class="row">
                    <div class="col-md-1"></div>
                    <div id="pokebox" class="col-md-2">
                        <img height = '100px' src="images/pikachu.png">
                        Pikachu
                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <img height = '100px' src="images/pikachu.png">
                        Pikachu
                    </div>
                    <div class="col-md-2"></div>
                    <div id="pokebox" class="col-md-2">
                        <img height = '100px' src="images/pikachu.png"> 
                        Pikachu
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
    </div>
    
<?php
include('../header.php');
?>
</body>
</html>
    
