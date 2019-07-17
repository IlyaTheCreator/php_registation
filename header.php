<?php
    
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<div >
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample09">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
        
        <?php
        
            if (isset($_SESSION['first'])) {
                echo "
                    <form action='includes/logout.inc.php' class='navlink ml-2''>
                        <button class='btn btn-outline-danger' type='submit' name='signupsubmit'>
                            Logout
                        </button>
                    </form>
                ";
            } else {
                echo "
                    <a class='navlink' href='signup.php'>
                        <button class='btn btn-outline-primary' type='submit' name='signupsubmit'>
                            Sign Up
                        </button>
                    </a>
                ";
                echo "
                    <a class='navlink ml-2' href='login.php'>
                        <button class='btn btn-outline-success'  name='loginsubmit'>
                            Login
                        </button>
                    </a>
                ";
            }
        
        ?>
        
    </div>
  </nav>
