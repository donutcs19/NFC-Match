
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matching RFID MJU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
  <body>
  
  <div class="modal modal-signin position-static d-block bg-info py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
        <h1 class="fw-bold mb-0 fs-2">Matching RFID</h1>
      
      </div>
      <div class="modal-body p-5 pt-0" novalidate>
        <form class="was-validated" action="insert_nfc_db.php" method="post" >
          <div class="form-floating mb-3">
            <input type="text" name="firstname" class="form-control rounded-3" placeholder="." required >
            <label for="floatingInput">Firstname</label>
            <div class="invalid-feedback">Please provide a firstname</div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="lastname" class="form-control rounded-3"  placeholder="." required> 
            <label for="floatingInput">Lastname</label>
            <div class="invalid-feedback">Please provide a lastname</div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="id_card" class="form-control rounded-3"  placeholder="." required>
            <label for="floatingInput">ID card</label>
            <div class="invalid-feedback">Please provide ID No./Passport No.</div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="nfc" class="form-control rounded-3"  placeholder="." required>
            <label for="floatingInput">RFID (NFC)</label>
            <div class="invalid-feedback">Please provide RFID (NFC) <br> ***In the case of MJU mobile app,please enter - </div>
            
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="cf_nfc" class="form-control rounded-3"  placeholder="." required>
            <label for="floatingInput">Confirm RFID (NFC)</label>
            <div class="invalid-feedback">Please confirm RFID (NFC) <br> ***In the case of MJU mobile app,please enter -</div>
            
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success"  type="submit" >Submit</button>
          
          <hr class="my-4">
      
          
        </form>
      </div>
    </div>
  </div>
</div>

    
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  </body>
</html>