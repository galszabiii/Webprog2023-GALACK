<div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="PHP/login.php">
                <h2>Login</h2>

                <?php if(isset($_SESSION['error'])){?>
                    <div class="error"> <?php echo $_SESSION['error']; ?> </div>
                <?php } unset($_SESSION['error'])?>
                
                <div class="inputBox">
                    <input type="text" required name="username">
                    <span>Username</span>
                    <i></i>
                 </div>
                <div class="inputBox">
                    <input type="password" required name="password">
                    <span>Password</span>
                    <i></i>
                </div>

                <div class="links">
                    <a href="index.php?page=forget">Forget Password</a>
                    <a href="index.php?page=reg">Signup</a>
                </div>
            
                <input type="submit" value="Log in">
        </form>
    </div>