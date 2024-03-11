<?php
    session_start();
    require_once('config.php');

    if(isset($_POST['signin'])){
        $email = $_POST['username'];
        $password = $_POST['password'];
          
                try{
                    $check_data = $conn->prepare("SELECT * FROM userss WHERE email = :email");
                    $check_data->bindParam(":email", $email);
                    $check_data->execute();
                    $row = $check_data->fetch(PDO::FETCH_ASSOC);

                    if ($check_data->rowCount() > 0) {
                        if ($email == $row['email']){
                            // if(password_verify($password , $row['password'])){
                                if($password == $row['password']){

                                if($row['urole'] == 'admin'){
                                    $_SESSION['admin_login'] = $row['user_id'];
                                    header("location: ../admin/welcome_admin.php");
                                }else{
                                    $_SESSION['user_login'] = $row['user_id'];
                                    header("location: ../user/welcome_user.php");
                                }
                            }else{
                                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                                header("location: login.php");
                            }
                        }else{
                            $_SESSION['error'] = "Username ไม่ถูกต้อง";
                            header("location: login.php");
                        }
                    }else{
                        $_SESSION['error'] = "ไม่มีข้อมูลในระบบ <a href='../register/register.php' class='alert-link'>คลิกที่นี่</a>เพื่อสมัครสมาชิก";
                        header("location: login.php");
                    }
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
            }    

    

?>