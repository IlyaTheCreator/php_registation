<?php
    
    require 'header.php';

?>
    
   

  <form class="form-signup" style="width: 40%; margin: 100px auto;" action="includes/signup.inc.php" method="post">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
    
    <?php
    
      if (!empty($_GET['error'])) {
          
          if ($_GET['error'] == 'emptyfields') {
              echo "<p class='text-danger'>Please, fill all of the fields!</p>";
          } else if ($_GET['error'] == 'invalidname') {
              echo "<p class='text-danger'>This nick is is invalid</p>";
          } else if ($_GET['error'] == 'invalidemail') {
              echo "<p class='text-danger'>This email is invalid</p>";
          } else if ($_GET['error'] == 'shortpwd') {
              echo "<p class='text-danger'>Password is too short (min 6 characters)</p>";
          } else if ($_GET['error'] == 'existentuser') {
              echo "<p class='text-danger'>The nick is taken.</p>";
          }
          
      } else {
          echo "<p>We are waiting for you!</p>";
      }
      
    ?> 
    
    
  </div>

  <div class="form-label-group my-3">
    <input 
        type="text"  
        name="nick" 
        class="form-control" 
        placeholder="Nickname"
    
        <?php
              if(isset($_GET['name'])) {
                  echo "value='" . $_GET['name'] . " ' ";
              }
        ?>

    >
  </div>

  <div class="form-label-group my-3">
    <input 
        type="text" 
        name="email"
        class="form-control" 
        placeholder="Email"
    
        <?php
            if(isset($_GET['email'])) {
                echo "value='" . $_GET['email'] . " ' ";
            }
        ?>
    
    >
  </div>
  
  <div class="form-label-group my-3">
    <input 
        type="text" 
        name="first" 
        class="form-control" 
        placeholder="First Name"
    
        <?php
            if(isset($_GET['first'])) {
                echo "value='" . $_GET['first'] . " ' ";
            }
        ?>
    
    >
  </div>
  
  <div class="form-label-group my-3">
    <input 
        type="text" 
        name="last" 
        class="form-control" 
        placeholder="Last Name"
        
        <?php
            if(isset($_GET['last'])) {
                echo "value='" . $_GET['last'] . " ' ";
            }
        ?>
    
    >
  </div>
  
  <div class="form-label-group my-3">
    <input type="password" name="pwd" class="form-control" placeholder="Password">
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign up</button>
</form>



    
<?php

    require 'footer.php';

?>