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
        <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
        <a href="../index.php" class="btn btn-primary">Home</a>
        <?php } ?>
      </div>
    </header>
  </div>

 