<div id="box" style="display:none;">
        <form action="PHP/uploadphoto.php" method="POST" enctype='multipart/form-data'>
            <input type="file" name="uploadFile" id="uploadFile" >
            <button type="submit" name="submit">Upload file</button>
        </form>
    </div>
   <div class="content">
        <div class="header-text">
            <h2>Photos You Sent!</h2>
        </div>
        <?php include 'PHP/displayPhoto.php'; ?>
   </div>