<?php
    include 'functions.php';

    if(isset($_POST['submit'])){
        session_start();
        $userName = $_SESSION['username'];
        $date=date('Y-m-d H:i:s');

        $fileName = $_FILES['uploadFile']['name'];
        $fileTmpName = $_FILES['uploadFile']['tmp_name'];
        $fileSize = $_FILES['uploadFile']['size'];
        $fileError = $_FILES['uploadFile']['error'];
        $fileType = $_FILES['uploadFile']['type'];

        
        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));
        
        $allowedFileType = array('jpg', 'jpeg', 'png');

       if(in_array($fileActExt, $allowedFileType) ){
            if($fileError === 0){
                if($fileSize < 500000){
                    $newFileName = uniqid('', true).".".$fileActExt;
                    $toSaveFile = 'photos/'.$newFileName;
                    move_uploaded_file($fileTmpName, $toSaveFile);

                    connectDataBase();
                    $sql_cmd = "insert into gallery(userName, imageName, uploadDate) values('$userName', '$newFileName', '$date')";
                    $sql_cmd = connectDataBase()->query($sql_cmd);
                    connectDataBase()->close();

                    header("Location: ../index.php?page=gallery");           
                }
                else{
                    $_SESSION['error'] = "A fájlmérete túl nagy!";
                    header("Location: ../index.php?page=gallery");
                }
            }
            else{
                $_SESSION['error'] = "Hiba lepett fel a feltöltes soran";
                header("Location: ../index.php?page=gallery");
            }
        }
        else{
            $_SESSION['error'] = "Nem megfelelo fajlformatum!";
            header("Location: ../index.php?page=gallery");
        }
    }
?>