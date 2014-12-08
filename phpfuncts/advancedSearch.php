#!/usr/local/bin/php
<?php
require('connection.php');
require('../phpfuncts/getNext.php');


    function advSearch($type1, $type2, $order){
        $connection = connection();
        var_dump($type1);
        var_dump($type2);
        var_dump($order);
        if($order == 0){
            $order = "ASC";
        }else{
            $order = "DESC";
        }
        if($type1 != NULL && $type2 != NULL && $type1 != "" && $type2 != "" ) {
            echo("1");
            $statement = oci_parse(
                $connection,
                //'SELECT * FROM pokemon ORDER BY IDENTIFIER ' . $order
                //'SELECT * FROM pokemon, (SELECT pokemon_id FROM pokemon_types WHERE type_id = '.$type1.') types WHERE pokemon.ID = types.pokemon_id'
                'SELECT * FROM POKEMON, (SELECT COUNT(IDENTIFIER) num, POKEMON_ID FROM pokemon, (SELECT POKEMON_ID FROM pokemon_types WHERE type_id = '
                . $type1 . ' OR type_id = ' . $type2
                . ') types WHERE pokemon.ID = types.pokemon_id GROUP BY POKEMON_ID) poke WHERE pokemon.ID = poke.pokemon_id AND poke.num >= 2 ORDER BY IDENTIFIER '
                . $order
            );
        }elseif($type1 != NULL && $type1 != "") {
            echo("2");
            $statement = oci_parse(
                $connection,
                //'SELECT * FROM pokemon ORDER BY IDENTIFIER ' . $order
                'SELECT * FROM pokemon, (SELECT pokemon_id FROM pokemon_types WHERE type_id = '.$type1.') types WHERE pokemon.ID = types.pokemon_id ORDER BY IDENTIFIER ' . $order
            );
        }elseif($type2 != NULL && $type2 != "") {
            echo("3");
            $statement = oci_parse(
                $connection,
                //'SELECT * FROM pokemon ORDER BY IDENTIFIER ' . $order
                'SELECT * FROM pokemon, (SELECT pokemon_id FROM pokemon_types WHERE type_id = '.$type2.') types WHERE pokemon.ID = types.pokemon_id ORDER BY IDENTIFIER ' . $order

            );
        }else{
            echo("4");
            $statement = oci_parse(
                $connection,
                'SELECT * FROM pokemon ORDER BY IDENTIFIER ' . $order
            );
        }
        oci_execute($statement);
        var_dump($statement);
        return $statement;
    }
?>