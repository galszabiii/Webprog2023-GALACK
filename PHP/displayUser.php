<?php
    
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<a href='./index.php?page=login'><span class='icon2'><ion-icon name='person-outline'></ion-icon ></span></a>";
    }else{
        echo "<p>".$_SESSION['username']."</p>";
        
        if (isset($_GET['page']) && $_GET['page'] === 'gallery') {
            echo "<button  id='showbox' onclick='showBox()'> Upload </button>";
        }
        echo "<form action='./PHP/logout.php' method='post'>";
        echo "<button id='logoutBtn'> Kijelentkezés </button>";
        echo "</form>";
    }
?>               