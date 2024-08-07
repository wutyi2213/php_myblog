<?php
    try{
        $server_name = "localhost:8080";
        $mysqlport = "3306";
        $dbname = "php_myblog";
        $dbuser = "root";
        $dbpassword = "";

        //Data source name
        $dsn = "mysql:host=$server_name;port=$mysqlport;dbname=$dbname";
        $conn = new PDO($dsn,$dbuser,$dbpassword);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Connection Success";

    }catch (PDOException $e){
        die("Connection Fail:".$e->getMessage());
    }
?>