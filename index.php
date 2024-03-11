<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matching RFID MJU</title>
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>



<div><?php if (isset($_SESSION['success'])) { ?>
              <div class="alert alert-success" role="alert" align="center">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
              <?php } ?>
              </div>
              <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert" align="center">
                  <?php
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                  ?>
                <?php } ?>
                </div>

                <?php if (isset($_SESSION['warning'])) { ?>
                  <div class="alert alert-danger" role="alert" align="center">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                  <?php } ?></div>

                  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        
      </a>
      
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <?php  if (isset($_SESSION['user_login'])){?>
        <a href="logout.php" class="btn btn-danger me-2">Logout</a>
        <?php }else{?>
        <a href="login/login.php" class="btn btn-outline-primary me-2">Login</a>
        
        <?php } ?>
      </div>
    </header>
  </div>
                  

  <div class="modal modal-signin position-static d-block bg-info py-5" tabindex="-1" role="dialog" id="modalSignin">
  
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
          <h1 class="fw-bold mb-0 fs-2">Matching RFID</h1>
          <button type="button" class="btn btn-outline-primary me-2" onclick="document.location = 'table.php'">ตารางข้อมูลทั้งหมด</button>
        </div>

        <div class="modal-body p-5 pt-0" novalidate>
          <form class="was-validated" action="config/insert_nfc_db.php" method="post">
            <div class="form-floating mb-3">
              <input type="text" name="firstname" class="form-control rounded-3" placeholder="." required>
              <label for="floatingInput">ชื่อ</label>
              <div class="invalid-feedback">กรุณากรอกชื่อ</div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="lastname" class="form-control rounded-3" placeholder="." required>
              <label for="floatingInput">นามสกุล</label>
              <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="id_card" class="form-control rounded-3" placeholder="." required>
              <label for="floatingInput">เลขบัตรประชาชน</label>
              <div class="invalid-feedback">กรุณากรอกเลขบัตรประชาชน</div>
            </div>

            <div class="form-floating mb-3">
              <input type="text" name="nfc" class="form-control rounded-3" placeholder="." required>
              <label for="floatingInput">เลข RFID (NFC)</label>
              <div class="invalid-feedback">กรุณากรอกเลข RFID (NFC) <br> ***กรณีใช้งาน MJU Mobile app, กรุณากรอกเครื่องหมาย -</div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="c_nfc" class="form-control rounded-3" placeholder="." required>
              <label for="floatingInput">ยืนยันเลข RFID (NFC)</label>
              <div class="invalid-feedback">กรุณายืนยันเลข RFID (NFC) <br> ***กรณีใช้งาน MJU Mobile app, กรุณากรอกเครื่องหมาย -</div>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" name="insert_nfc" type="submit">บันทึกข้อมูล</button>

            <hr class="my-4">
            
          </form>

        </div>
      </div>
    </div>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>