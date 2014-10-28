#!/usr/local/bin/php
<?php
    require('connection.php');
    
    
    function getAllPokemon(){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM pokemon');
        oci_execute($statement);
        
        //while (($row = oci_fetch_object($statement))) {
          //var_dump($row);
        //}
        //returns an object that holds all of the query
        return $statement;
    }


    function getNext($statement){
        $next = oci_fetch_object($statement);
        //gets next item in query
        return $next;
    }
    
    function getPokemon($pokemon){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM pokemon WHERE IDENTIFIER LIKE \'%'.$pokemon.'%\'');
        oci_execute($statement);
        
        //while (($row = oci_fetch_object($statement))) {
          //var_dump($row);
        //}
        //returns an object that holds all of the query
        return $statement;
    }

  $value = getPokemon('b%');
  
  while($result = getNext($value)){
    var_dump($result);
    ?><br /><br /><?
  }

    
?>