<?php
    
    define('DEF_NUM', 3);

    require 'header.php';

?>
    
   

  <form class="form-signin" style="width: 40%; margin: 100px auto;" action="includes/login.inc.php" method="post">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    
    
    <?php
    
      if (!isset($_GET['error'])) {
          echo "<p>Come on!</p>";
      } else if ($_GET['error'] == 'novalues') {
          echo "<p class='text-danger'>Please, write your email and password!</p>";
      } else if ($_GET['error'] == 'noemail') {
          echo "<p class='text-danger'>Please, write your email!</p>";
      } else if ($_GET['error'] == 'nopwd') {
          echo "<p class='text-danger'>Please, write your password!</p>";
      } else if ($_GET['error'] == 'invalidemail') {
          echo "<p class='text-danger'>Email is invalid.</p>";
      } else if ($_GET['error'] == 'nouser') {
          echo "<p class='text-danger'>We are sorry. There's no such user in our database.</p>";
      } else if ($_GET['error'] == 'wrongpwd') {
          echo "<p class='text-danger'>Wrong password.</p>";
      } 
      
    ?>
    
    
  </div>

  <div class="form-label-group my-3">
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  
  <div class="form-label-group my-3">
    <input type="password" name="pwd" class="form-control" placeholder="Password">
  </div>

  <button 
    class="btn btn-lg btn-success btn-block" 
    type="submit" 
    name="login"
    <?php
        if (isset($_SESSION['first'])) {
        echo "disabled";
      }       
    ?>
    >
    Sign in
    </button>
</form>



    
<?php

    require 'footer.php';

?>