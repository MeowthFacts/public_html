#!/usr/local/bin/php
<?php
    require('connection.php');
    
    
    function getAllPokemon(){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM pokemon');
        oci_execute($statement);
        

        return $statement;
    }
    
    
    function getPokemon($pokemon){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM pokemon WHERE IDENTIFIER LIKE LOWER(\'%'.$pokemon.'%\')');
        oci_execute($statement);
        

        return $statement;
    }

    function getPokemonProfile($pokemon){
        $connection = connection();
        
        $statement  = oci_parse($connection, 'SELECT * FROM pokemon WHERE ID = '.$pokemon);
        oci_execute($statement);
        
        $thePokemon = oci_fetch_object($statement);
        $type1 = -1;
        $type2 = -1;
        
        $statement = oci_parse($connection, 'SELECT type_names.name FROM pokemon_types, type_names WHERE type_names.TYPE_ID = pokemon_types.type_id AND pokemon_types.POKEMON_ID = '.$thePokemon->ID);
        oci_execute($statement);
      

        $type1 = oci_fetch_object($statement);
        $type2 = oci_fetch_object($statement);
        
        
        return array($thePokemon, $type1, $type2);
    }


    function getNext($statement){
        $next = oci_fetch_object($statement);
        //gets next item in query
        return $next;
    }

  

    
?>