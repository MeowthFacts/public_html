<?php

function getNext($statement)
{
    $next = oci_fetch_object($statement);
    //gets next item in query
    return $next;
}

?>