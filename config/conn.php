<?php
        $servername = "localhost";
        $username = "shikikie";
        $password = "Kikie@564133";
        $database = "card_rfid";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);
            //set PDO ERROR mode to Exception
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "db_connected";
        }catch(PDOException $e){
            echo "db_not_connected: " .$e->getMessage();

        }







?>