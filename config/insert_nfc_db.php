<?php
session_start();
require_once("conn.php");
date_default_timezone_set('Asia/bangkok');

if (isset($_POST['insert_nfc'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id_card = $_POST['id_card'];
    $nfc = $_POST['nfc'];
    $c_nfc = $_POST['c_nfc'];
    $status = '1';
    $time_at = date('Y-m-d H:i:s');
    

  

    if ($nfc != $c_nfc) {
        $_SESSION["error"] = "เลข NFC ไม่ตรงกัน!!!";
        header("location: ../index.php");
    } else {
        try {
            $check_nfc = $conn->prepare("SELECT rfid FROM nfc_db WHERE rfid = :rfid");
            $check_nfc->bindParam(":rfid", $nfc);
            $check_nfc->execute();
            $row = $check_nfc->fetch(PDO::FETCH_ASSOC);

            if ($nfc == $row['rfid'] && $nfc != '-') {
                $_SESSION['warning'] = "มีเลข RFID(NFC) นี้อยูในระบบแล้ว ";
                header("location: ../index.php");
            } else if (!isset($_SESSION['error'])) {

                $stmt = $conn->prepare("INSERT INTO nfc_db(firstname, lastname, id_card, rfid, c_rfid, status, update_at, create_at) 
                VALUES(:firstname, :lastname, :id_card, :nfc, :c_nfc, :status, CURRENT_TIMESTAMP, :time_at)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":id_card", $id_card);
                $stmt->bindParam(":nfc", $nfc);
                $stmt->bindParam(":c_nfc", $c_nfc);
                $stmt->bindParam(":status", $status);
                $stmt->bindParam(":time_at", $time_at);
               
                $stmt->execute();

                // if ($nfc != '-' && $c_nfc != '-') {
                //     //  AhWyoU0fhG6Nj5QPw36Hnw7E0MhtPu3BTywpNYsM2yg token
                //     $sToken = "AhWyoU0fhG6Nj5QPw36Hnw7E0MhtPu3BTywpNYsM2yg";
                //     $sMessage .= "\r\n";
                //     $sMessage .= "ID No./Passport No. : " . $id_card . "\r\n";
                //     $sMessage .= "ชื่อ-นามสกุล: " . $firstname . " " . $lastname . " \r\n";
                //     $sMessage .= "RFID: " . $nfc . " \r\n";
                //     $sMessage .= "ยืนยัน RFID: " . $c_nfc . " \r\n";
                // } else {
                //     //  AhWyoU0fhG6Nj5QPw36Hnw7E0MhtPu3BTywpNYsM2yg token
                //     $sToken = "AhWyoU0fhG6Nj5QPw36Hnw7E0MhtPu3BTywpNYsM2yg";
                //     $sMessage .= "\r\n";
                //     $sMessage .= "ID No./Passport No. : " . $id_card . "\r\n";
                //     $sMessage .= "ชื่อ-นามสกุล: " . $firstname . " " . $lastname . " \r\n";
                //     $sMessage .= "ไม่มีบัตรขอใช้งานผ่าน MJU Mobile\r\n";
                // }


                // $chOne = curl_init();
                // curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                // curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                // curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                // curl_setopt($chOne, CURLOPT_POST, 1);
                // curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                // $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
                // curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                // curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                // $result = curl_exec($chOne);

                // //Result error 
                // if (curl_error($chOne)) {
                //     echo 'error:' . curl_error($chOne);
                // } else {
                //     $result_ = json_decode($result, true);
                //     echo "status : " . $result_['status'];
                //     echo "message : " . $result_['message'];
                // }
                // curl_close($chOne);

                $_SESSION['success'] = "ดำเนินการส่งข้อมูลให้ผู้ดูแลระบบทำการผูกข้อมูลแล้ว <a href='table.php' class='alert-link'>คลิกที่นี่</a>เพื่อตรวจสอบสถานะ";
                header("location: ../index.php");
            } else {
                $_SESSION['error'] = "มีข้อผิดพลาด";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
