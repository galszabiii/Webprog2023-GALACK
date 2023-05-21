<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= $pagetitle['title'] . ( (isset($pagetitle['motto'])) ? ('|' . $pagetitle['motto']) : '' ) ?></title>
      
      <link rel="stylesheet" href="CSS/headerFooter.css">
      <?php if(file_exists('CSS/'.$find['file'].'.css')) { ?><link rel="stylesheet" href="CSS/<?= $find['file']?>.css" type="text/css"><?php } ?>
      
      <script src="JAVASCRIPT/userLogOut.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <script>
        function showBox() {
          var div = document.getElementById("showbox");
          var box = document.getElementById("box");

          if (box.style.display === "none") {
            box.style.display = "block";
          } else {
            box.style.display = "none";
          }
        }
	    </script>

  </head>
  <body>
    <header>
      <nav class="navigation">
          
          <div class="logo">
              <img src="/templates/images/<?=$logo['imagesource']?>" alt="<?=$logo['imagealt']?>" width="80px" height="80px">
          </div>

          <div class="pages">
            <?php foreach ($pages as $url => $page) { ?>
              <li<?= (($page == $find) ? ' class="active"' : '') ?>>
              <a href="index.php<?= ($url == '/') ? '' : ('?page=' . $url) ?>">
              <?= $page['text'] ?></a>
              </li>
            <?php } ?>
          </div>
          <div class="userAction">
            <?php include 'PHP/displayUser.php';?>
          </div>
      </nav>
      
  </header>
  <div id="content">
    <?php include("./templates/pages/{$find['file']}.tpl.php"); ?>
  </div>
    <footer>
      <?php if(isset($footer['copyright'])) { ?>&copy;&nbsp;<?= $footer['copyright'] ?> <?php } ?>
      &nbsp;
      <?php if(isset($footer['firm'])) { ?><?= $footer['firm']; ?><?php } ?>
    </footer>

  </body>
</html>

<script src = "JAVASCRIPT/addToCart.js"></script>

</script>

<script>
  document.getElementById("logoutBtn").addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/PHP/logout.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            window.location.href = "../index.php";
        }
    };
    xhr.send();
});
</script>