#!/usr/local/bin/php
<?php
	include('connection.php');
	$q=$_GET['q'];
	$my_data = $_GET['q'];
	
	$connection = connection();
        $statement = oci_parse($connection, 'SELECT * FROM pokemon WHERE IDENTIFIER LIKE \'%'.$my_data.'%\' ORDER BY IDENTIFIER');
        oci_execute($statement);

	
	while($next = oci_fetch_object($statement))
	{
		echo $next->IDENTIFIER."\n";
	}
?>