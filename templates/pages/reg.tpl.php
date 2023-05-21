<div class="box">
    <span class="borderLine"></span>
    <form  method="POST" action="PHP/registraion.php">
        <h2>Sign up</h2>

        <?php if(isset($_SESSION['error'])){?>
            <div class="error"> <?php echo $_SESSION['error']; ?> </div>
        <?php } unset($_SESSION['error'])?>
        <?php if(isset($_SESSION['success'])){?>
            <div class="success"> <?php echo $_SESSION['success']; ?> </div>
        <?php } unset($_SESSION['success']) ?>


        <div class="inputBox">
                <input type="text"  required="required" name="firstname" id="firstname" pattern="[A-Za-z .]{2,}">
                <span>First name</span> 
                <i></i>
        </div>
        <div class="inputBox">
                <input type="text"  required="required" name="lastname" id="lastname" pattern="[A-Za-z .]{2,}">
                <span>Last name</span>
                <i></i>
        </div>
        <div class="inputBox">
            <input type="text"  required="required" name="username" id="username" pattern="[A-Za-z0-9_]{4,}">
            <span>Username</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="email" required="required" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            <span>Email</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="password"  required="required" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <span>Password</span>
            <i></i>
        </div>
        <div class="links">
            <p>Already have an account? Back to <a href="index.php?page=login">Login</a>. </p>
        </div>
        
        <input  type="submit" value="Sign up">
    </form>        
</div>