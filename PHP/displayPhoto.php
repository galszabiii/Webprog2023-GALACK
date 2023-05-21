<?php
    include 'functions.php';

    connectDataBase();
    $sql_cmd = "select * from gallery";
    $sql_cmd = connectDataBase()->query($sql_cmd);
    while($row = $sql_cmd->fetch_assoc()){
        $myarray[] = $row;
    }
    $i = 0;
    foreach($myarray as $myarray){
        $username[$i] = $myarray['userName'];
        $date[$i] = $myarray['uploadDate'];
        $pImageName[$i] = $myarray['imageName'];
        $i=$i+1;
    }

    $i=0;
    $gallerydir = opendir("PHP/photos");
    $deniedtoshow = array('.', '..');
    
    
    
    
    while(false != ($filename = readdir($gallerydir))){
        if (!in_array($filename, $deniedtoshow)){

            $j = 0;

            while($pImageName[$j] != $filename && $j <= $i){
                $j++;
            }

            echo "<div class='picture-card'>";
                echo " <div class='picture-box'>";
                    echo "<img src='PHP/photos/".$filename."' >";
                echo "</div>";
                echo " <div class='picture-details'>";
                    echo " <div class='user'>";
                        echo $username[$j];
                    echo "</div>";
                    echo " <div class='date'>";
                        echo $date[$j];
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
        $i++;
    }
 
?>
