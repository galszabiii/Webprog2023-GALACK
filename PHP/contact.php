<?php
    if(isset($_POST['name']) && isset($_REQUEST['message'])){
        include 'functions.php';

        connectDataBase();
        $from = $_POST['name'];
        $message = $_REQUEST['message'];

        $table="Contact";
        $insert="nameFrom, Message, Datum";
        $date=date('Y-m-d H:i:s');
        $values="'$from', '$message', '$date'";

        insertSQL($table, $insert, $values);

        $toEmail = 'g.szabi555@gmail.com';
        $fromEmail  = 'From:szabi@galack.nhely.hu';
        $subject = 'Contact Page Message';
        mail($toEmail, $subject, $message, $fromEmail);
        connectDataBase()->close();
        header("Location: ../index.php?page=contact");
    }
?>