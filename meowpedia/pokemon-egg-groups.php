#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
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
  
  <?
    $gID = $_POST["groupID"];
    $groupName = $_POST["groupName"];
?>
   <h1>Pokemon in the <?echo($groupName); ?> Egg Group</h1> <br /><br />
  <?php

    function getNext($statement){
        $next = oci_fetch_object($statement);
        return $next;
    }

    function getPokemon($groupID){
        $connection = connection();
        
        $sql = 'SELECT P.IDENTIFIER, P.ID 
        FROM POKEMON P, POKEMON_EGG_GROUPS E 
        WHERE P.ID = E.SPECIES_ID
        AND E.EGG_GROUP_ID ='.$groupID;
            
        $statement = oci_parse($connection, $sql);
        oci_execute($statement);
        

        return $statement;
    }
    
    $result = getPokemon($gID);
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
          <td><? echo(ucwords($current->ID)); ?> </td>
          <td><? echo(ucwords($current->IDENTIFIER)); ?> </td>
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