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
    <center><h1>Types</h1></center>
    
    <?php

     function getTypes(){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM TYPE_NAMES');
        oci_execute($statement);

        return $statement; 
    }

    function getNext($statement){
        $next = oci_fetch_object($statement);
        return $next;
    }

    $types = getTypes();
    $current = getNext($types);
    ?>
    <table class="table">
        <thead>
        <tr>
          <th>#</th>
          <th>Type</th>
        </tr>
      </thead>
        <? while( $current->TYPE_ID <= 18 ) { ?> <tr><td><? echo($current->TYPE_ID); ?></td><td><? echo($current->NAME); ?></td></tr> <? $current = getNext($types); } ?>
        
        
        
    </table>
    
    
    <?php
    include('../header.php');
    ?>
 
</body>
</html>