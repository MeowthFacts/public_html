<?php
    function connection(){
        $user = 'jkegley';
        $pass = 'password';
        $connect = 'oracle.cise.ufl.edu/orcl';

        $connection = oci_connect($username = $user,
                                  $password = $pass,
                                  $connection_string = $connect);
        return $connection;
    }
?>