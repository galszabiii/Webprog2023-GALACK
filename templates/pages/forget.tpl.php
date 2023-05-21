<div class="box">
        <span class="borderLine"></span>
        <form action="PHP/forgetPassword.php" method="POST">
            <h2>Forget password</h2>
            <h3>Enter the email address associated with your account and we'll send you a link to reset your password!</h3>
    
            <?php if(isset($_SESSION['error'])){?>
                <div class="error"> <?php echo $_SESSION['error']; ?> </div>
            <?php } unset($_SESSION['error'])?>

            <?php if(isset($_SESSION['success'])){?>
                <div class="success"> <?php echo $_SESSION['success']; ?> </div>
            <?php } unset($_SESSION['success'])?>
    
            <div class="inputBox">
                <input type="email" required="required" name="email">
                <span>Email</span>
                <i></i>
            </div>
    
            <button id="btn">Request New Password</button> 
    
            <div class="links">
                <p>
                    Back to <a href="index.php?page=login">Login</a>. </p>
            </div>
            
              
        </form>
    </div>