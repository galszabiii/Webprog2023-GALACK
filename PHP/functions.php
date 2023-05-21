<?php
    //connect database
    function connectDataBase() {
        $server = "mysql.nethely.hu";
        $user = "galack";
        $passwd = "Webprog2023";
        $database = "galack";
        $conn = new mysqli($server, $user, $passwd, $database);

        if($conn->connect_error){
            die("Connection failed" .$conn->connect_error);
        }
        
        return $conn;
    }

    //insert database
    function insertSQL($table, $insert, $values) {
        $sql_com = "insert into $table($insert) values( $values)";
        connectDataBase()->query($sql_com);
    }



?>