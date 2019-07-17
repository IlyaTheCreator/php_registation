<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        
        require( 'dbh.inc.php');
        
        function validate($var) {
            return trim(htmlspecialchars($var));
        }
        
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        
        if (empty($email) && empty($pwd)) {
            header("Location: ../login.php?error=novalues");
            exit;
        } else if (empty($email)) {
            header("Location: ../login.php?error=noemail");
            exit;
        } else if (empty($pwd)) {
            header("Location: ../login.php?error=nopwd");
            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../login.php?error=invalidemail");
            exit;
        } else {
            
            $email = validate($email);
            $pwd = validate($pwd);
            
            $sql = "SELECT * FROM users WHERE user_email=?";
            
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=preperrs");
                exit;
            } else {
                
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if ($row = mysqli_fetch_assoc($result)) {
                    
                    $passwordCheck = password_verify($pwd, $row['user_password']);
                    
                    if ($passwordCheck == false) {
                        header("Location: ../login.php?error=wrongpwd");
                        exit;
                    } else {
                        
                        session_start();
                        $_SESSION['nick'] = $row['user_uid'];
                        $_SESSION['email'] = $row['user_email'];
                        $_SESSION['first'] = $row['user_first'];
                        $_SESSION['last'] = $row['user_last'];
                    
                        header("Location: ../index.php?login=success");
                        exit;
                        
                    }
                    
                } else {
                    header("Location: ../login.php?error=nouser");
                    exit;
                }
                
            }
            
        }
        
    } else {
        
        header("Location: ../login.php?error=badrequest");
        exit;
        
    }





