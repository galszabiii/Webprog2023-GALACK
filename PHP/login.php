<?php
    include 'functions.php';
    include './includes/config.inc.php';
    session_start();
    
    if(isset($_POST['password']) && isset($_POST['username'])){
        connectDataBase();
        $userName = $_POST['username'];
        $pwd = $_POST['password'];

        $sql_cmd = "select Password from user where userName = '$userName'";
        $sql_cmd = connectDataBase()->query($sql_cmd);
        

        if ($sql_cmd->num_rows == 0 ){
            $_SESSION['error'] = "Sikertelen bejelentkezes";
            header("Location: ../index.php?page=login");
        }else{
            $data = $sql_cmd->fetch_assoc();
            $data = $data['Password'];
            if(password_verify($pwd, $data)){
                session_start();
                //sikeresen bejelentkeztél
                $_SESSION['username'] = $userName;
                header("Location: ../index.php");
            }else{        
                //nem jelentkeztél be
                $_SESSION['error'] = "Sikertelen bejelentkezes"; 
                header("Location: ../index.php?page=login");
            }
        }
        connectDataBase()->close();
        
    }
?>