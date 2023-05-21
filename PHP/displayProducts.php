<?php
    include 'functions.php';
    connectDataBase();
    
    $polo = "polo";
    $sql_cmd = "select * from products ";
    $sql_cmd = connectDataBase()->query($sql_cmd);
    while($row = $sql_cmd->fetch_assoc()){
        $myarray[] = $row;
    }
    $i = 0;
    foreach($myarray as $myarray){
        $pName[$i] = $myarray['productName'];
        $pPrice[$i] = $myarray['productPrice'];
        $pType[$i] = $myarray['productType'];
        $pImageName[$i] = $myarray['productImage'];
        $i=$i+1;
    }

    $productdir = opendir("PHP/products");
    $deniedtoshow = array('.', '..');
    
    $i=0;
    while(false != ($filename = readdir($productdir))){
        if (!in_array($filename, $deniedtoshow)){
            $j = 0;

            while($pImageName[$j] != $filename && $j <= $i){
                $j++;
            }
            echo "<div class='product-card' id='".$pType[$j]."'>";
                echo "<div class='product-image' >";
                    echo "<img src='PHP/products/".$pImageName[$j]."' >";
                echo "</div>";
            
                echo "<div class='product-info'>";
                    echo "<h3 class='product-name' name='pName'> ".$pName[$j]." </h3>";
                    echo "<p class='product-price' name='pPrice'> $".$pPrice[$j]." </p>";
                    echo "<p class='product-type' name='pType'> ".$pType[$j]." </p>";
                echo "</div>";                    
                echo "<div>";
                    echo "<button class='product-button' name='submit'> Add to cart </button>";
                echo "</div>";
            echo "</div>";
        }
        $i++;
    }    
?>
