<?php
    session_start();
    if(isset($_POST['email'])){
        include 'functions.php';
        $toEmail = $_POST['email'];

        connectDataBase();
        $sql_cmd = "select userName from user where Email = '$toEmail'";
        $sql_cmd = connectDataBase()->query($sql_cmd);

        if($sql_cmd->num_rows == 0){
            $_SESSION['error'] = "No user found to this email!";
            header("Location: ../index.php?page=forget");
        }else{
            connectDataBase()->close();
            connectDataBase();
            //generate new password
            $newPassword = generateRandomString();
            $hashedNewPwd = password_hash($newPassword, PASSWORD_DEFAULT);
            connectDataBase()->close();
            //upload to database
            $sql_cmd = "update user set password = '$hashedNewPwd' where email = '$toEmail'";
            $sql_cmd = connectDataBase()->query($sql_cmd);

            $from='From:szabi@galack.nhely.hu';
            $subject='Forget password';
            
            $msg = "Your new password is: '$newPassword'";
            mail($toEmail, $subject, $msg, $from);
            $_SESSION['success'] = "Email sent successfully!";
            header("Location: ../index.php?page=forget");
        }
        connectDataBase()->close();   
        

    }
    function generateRandomString() {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // Ellenőrizzük, hogy tartalmaz-e legalább egy számot és kis- és nagybetűt
        if (!preg_match('/\d/', $randomString) || !preg_match('/[a-z]/', $randomString) || !preg_match('/[A-Z]/', $randomString)) {
            // Ha nincs benne legalább egy szám vagy kis- és nagybetű, akkor generálunk egy újat
            $randomString = generateRandomString();
        }
        return $randomString;
    }
?>