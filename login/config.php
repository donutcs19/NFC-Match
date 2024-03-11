<?php
        $servername = "localhost";
        $username = "shikikie";
        $password = "Kikie@564133";
        $database = "system_login_db";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
            //set PDO ERROR mode to Exception
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "เชื่อมฐานข้อมูลสำเร็จ";
        }catch(PDOException $e){
            echo "เชื่อมฐานข้อมูลไม่สำเร็จ: " .$e->getMessage();

        }







?>