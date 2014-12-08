<?php

function getProfile($pokemon){
    $connection = connection();

    $statement = oci_parse($connection, 'SELECT DISTINCT moves.IDENTIFIER FROM MOVES, (SELECT ID FROM pokemon WHERE ID = '.$pokemon.') poke, POKEMON_MOVES WHERE LEVELS != 0 AND poke.ID = POKEMON_MOVES.POKEMON_ID AND POKEMON_MOVES.MOVE_ID = MOVES.ID');
    oci_execute($statement);
    $moves = $statement;

    $statement = oci_parse($connection, 'SELECT * FROM  STATS, (SELECT * FROM pokemon_stats) stat_nums,(SELECT ID FROM pokemon WHERE id = '.$pokemon.') poke WHERE STATS.STAT_ID = stat_nums.STAT_ID AND poke.id = stat_nums.pokemon_id');
    oci_execute($statement);
    $stats = $statement;

    $statement = oci_parse($connection, 'SELECT ID, IDENTIFIER FROM ABILITIES, POKEMON_ABILITIES WHERE ABILITIES.id = POKEMON_ABILITIES.ABILITY_ID AND POKEMON_ABILITIES.POKEMON_ID = '.$pokemon);
    oci_execute($statement);
    $abilities = $statement;

    return array($moves, $stats, $abilities);
}

?>