#!/usr/local/bin/php
<?php
    require('connection.php');
    

        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM pokemon AND SELECT * FROM pokemon_types');
        oci_execute($statement);

       

  
  while( $next = oci_fetch_object($statement)){
    var_dump($next);
    ?><br /><br /><?
  }

    
?>