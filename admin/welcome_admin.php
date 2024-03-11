<?php
session_start();
if (!isset($_SESSION['admin_login'])){
  header("location: ../login/login.php");
}
require_once ('../config/conn.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Admin</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
</head>

<style>
a:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid green;
  padding: 2px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: green;
  color: white;
}
</style>
  <body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

  <symbol id="calendar3" viewBox="0 0 16 16">
    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"></path>
    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
  </symbol>
  
  <symbol id="geo-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"></path>
  </symbol>
</svg>
    <?php require_once ("bootstrap/nav.php"); ?>

    
    <div class="container px-4 py-5" id="custom-cards">

    <?php
  $admin_id = $_SESSION['admin_login'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
  $stmt->bindParam(":user_id", $admin_id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <h2 class="pb-2 border-bottom">Welcome Admin <?php echo $row['firstname']?>  <?php echo $row['lastname']?></h2>

    <div class="container">
    
    <table id="db_table" class="table table-striped">
      <thead>
        <th>id</th>
        <th>เลขบัตรประชาชน/พาสปอร์ต</th>
        <th>ชื่อ-นามสกุล</th>
        <th>เลข RFID (NFC)</th>
        <th>เวลาส่งข้อมูล</th>
        <th>เวลาอัพเดทข้อมูล</th>
        <th>สถานะ</th>
        <th>.</th>
        
      </thead>
      <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM nfc_db ORDER BY id DESC");
        $stmt->execute();
        $db = $stmt->fetchALL();
        foreach ($db as $nfc_db) {
        ?>

          <tr>
            <td><?php echo $nfc_db["id"] ?></td>
            <td><?php echo $nfc_db["id_card"] ?></td>
            <td><?php echo $nfc_db["firstname"] ?><?php echo $nfc_db["lastname"] ?></td>
            <td><?php if ("" . $nfc_db['rfid'] . "" != '-') { ?>
                <font color="blue"><?php echo $nfc_db["rfid"] ?></font>
              <?php } else { ?><font color="green">MJU Mobile</font><?php } ?>
            </td>
            <td><?php echo $nfc_db["create_at"] ?></td>
            <td><?php echo $nfc_db["update_at"] ?></td>
            <td><?php if ("" . $nfc_db['status'] . "" == '1') { ?><font color="red">รอดำเนินการ</font>
              <?php } else if ("" . $nfc_db['status'] . "" == '2') { ?><font color="green">ดำเนินการเรียบร้อย</font>
                <?php } else { ?>-<?php } ?></td>
            <!-- <td><button type="button" onclick="return confirm('Match NFC OK???')">
            <a href="welcome_admin.php?ID=<?=$nfc_db["id"];?>"></a>OK</button></td>    -->
            <td><a href="welcome_admin.php?ID=<?=$nfc_db["id"];?>" onclick="return confirm('Match NFC OK???')">OK</a></td>
          </tr>
             
        <?php } ?>
      </tbody>
    </table>
    <hr>
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" onclick="document.location = 'index.php'">เพิ่มข้อมูล</button>
  </div>

  <?php 
    
  $ID = $_GET['ID'];  
  $sql = "UPDATE nfc_db SET status = '2', update_at = CURRENT_TIMESTAMP() WHERE id=$ID";
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  
?>
  <!-- <?php require_once ("bootstrap/footers.php"); ?> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#db_table').DataTable({
        order: [[0, 'desc']],
    });
    });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>