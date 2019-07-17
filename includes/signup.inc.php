<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
        
        require('dbh.inc.php');
        
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $pwd = $_POST['pwd'];
        
        function validate($var) {
            return trim(htmlspecialchars($var));
        }
        
        if (empty($nick) || empty($email) || empty($first) || empty($last) || empty($pwd)) {
            header("Location: ../signup.php?error=emptyfields");
            exit;
        }  else if (!preg_match('/^[a-zA-Z0-9\s]+$/' , $nick)) {
            header("Location: ../signup.php?error=invalidname&email=" . $email . "&first=" . $first . "&last=" . $last);
            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidemail&name=" . $nick . "&first=" . $first . "&last=" . $last);
            exit;
        } else if (strlen($pwd) < 6) {
            header("Location: ../signup.php?error=shortpwd&name=" . $nick . "&first=" . $first . "&last=" . $last . "&email=" . $email);
            exit;
        } else {
            
            $nick = validate($nick);
            $email = validate($email);
            $first = validate($first);
            $last = validate($last);
            $pwd = validate($pwd);
            
            $sql = 'SELECT user_uid FROM users WHERE user_uid=? OR user_email=?;';
            
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=preperrs");
                exit;
            } else {
                
                mysqli_stmt_bind_param($stmt, "ss", $nick, $email);
                mysqli_stmt_execute($stmt);
                
                $result = mysqli_stmt_get_result($stmt);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0 ) {
                    header("Location: ../signup.php?error=existentuser");
                    exit;
                } else {
                    
                    $sql = 'INSERT INTO users (user_uid, user_first, user_last, user_email, user_password) VALUES (?, ?, ?, ?, ?);';
            
                    $stmt = mysqli_stmt_init($conn);
            
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=preperrin");
                        exit;
                    } else {
                        
                    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                
                    mysqli_stmt_bind_param($stmt, "sssss", $nick, $first, $last, $email, $hashed_pwd);
                    mysqli_stmt_execute($stmt);
                        
                    header("Location: ../index.php?signup=success");
                    exit;
                    
                }
                
            }
        }
            
    }
        
} else {
    header("Location: ../signup.php?error=badrequest");
    exit;
}