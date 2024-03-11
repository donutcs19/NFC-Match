<?php
session_start();
require_once("config/conn.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matching RFID MJU</title>
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>



  <div class="container">
    <h3 class="mt-4">Table Matching RFID</h3>
    <hr>
    <table>
      <thead>
        <th>id</th>
        <th>เลขบัตรประชาชน/พาสปอร์ต</th>
        <th>ชื่อ-นามสกุล</th>
        <th>เลข RFID (NFC)</th>
        <th>เวลาส่งข้อมูล</th>
        <th>เวลาอัพเดทข้อมูล</th>
        <th>สถานะ</th>
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

          </tr>

        <?php } ?>
      </tbody>
    </table>
    <hr>
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" onclick="document.location = 'index.php'">เพิ่มข้อมูล</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#db_table').DataTable();
    });
  </script>


</body>

</html>