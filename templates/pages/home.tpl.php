<div class="container">
    <div class="products">
        <?php include 'PHP/displayProducts.php';?>
    </div>

    <?php 
        if(isset($_SESSION['username'])){ ?>
            <div class="cart">
                <h2>My cart</h2>
                <div class="myCart" id="productsAddingHere">    </div> 
                <a href="index.php"><button>Buy</button></a>
            </div>
        <?php } 
    ?>
    <div class="cart" style="display: none;">
        <h2>My cart</h2>
        <div class="myCart" id="productsAddingHere">    </div> 
        <a href="index.php"><button>Buy</button></a>
    </div>
</div>