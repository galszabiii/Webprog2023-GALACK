<?php
    session_start();
    include 'functions.php';
    if(isset($_POST['firstname'])){
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        connectDataBase();
        $sql_email = "select Email from user where Email = '$email'";
        $sql_cmd = connectDataBase()->query($sql_email);
    
        if($sql_cmd->num_rows == 0){
    
            $sql_uName = "select userName from user where userName = '$userName'";
            $sql_cmd = connectDataBase()->query($sql_uName);
    
            if($sql_cmd->num_rows == 0){
                $table = "user";
                $insert = "userName, Email, Password";
                $values = "'$userName', '$email', '$pwd'";
                insertSQL($table, $insert, $values);
    
                $table="userDetails";
                $insert = "userName_det, firstName, lastName";
                $values = "'$userName', '$firstName', '$lastName'";
                insertSQL($table, $insert, $values);
                connectDataBase()->close();

                $_SESSION['success'] = "Successful registration!";
                header("Location: ../index.php?page=reg");
                            
            }else{
                $_SESSION['error'] = "Unavailable username... Try again!";
                header("Location: ../index.php?page=reg");
            }
            connectDataBase()->close();
        }
        else{
            $_SESSION['error'] = "Unavailable email... Try again!";
            header("Location: ../index.php?page=reg"); 
        }
        
    }
   
    
    
?>