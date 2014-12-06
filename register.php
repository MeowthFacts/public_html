#!/usr/local/bin/php

<html>
 <?php
 $usernameR = $_POST['username'];
 $passwordR = $_POST['password'];
 $emailR = $_POST['email'];

 function connection(){
         $user = 'jkegley';
         $pass = 'password';
         $connect = 'oracle.cise.ufl.edu/orcl';
         $connection = oci_connect($username = $user,
                                   $password = $pass,
                                   $connection_string = $connect);
         return $connection;
     }
$db = connection();
if (!$db)
{
$e = oci_error(); 
echo "if not connection<br>";
echo htmlentities($e['message']);
}else{
 echo 'connected';
}

 
$sql = 'INSERT INTO USERTEST VALUES(:userR, :passR, :emailR)';

$compiled = oci_parse($db, $sql);

oci_bind_by_name($compiled, ':userR', $usernameR);
oci_bind_by_name($compiled, ':passR', $passwordR);
oci_bind_by_name($compiled, ':emailR', $emailR);


$rc=oci_execute($compiled);
if(!$rc)
{
$e=oci_error($compiled);
var_dump($e);
}
else{
echo ' successfully added user';
header( 'Location: index.php' );
}
oci_commit($db);

oci_free_statement($compiled);
oci_close($db);
 

 
 ?>	
	
</html>