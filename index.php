<?php
    include 'inc/header.php';
    ?>

    <div class="container site-section" id="welcome">
        <h1 id="WelcomeHeader">Welcome to Adnan's Cake Shop</h1>
        <p>Adnan's Cake Shop Bakery was founded in Bangladesh with the mission of great cake of the world. Our dedication and tasty cakes have won us numerous awards.</p>
    </div>
    <div class="container site-section" id="why">
        <h1>Why Choose Us </h1>
        <div class="row" id="WhyChooseUsBackground">
            <div class="col-md-4 item"><i class="fa fa-birthday-cake" id="BdayCakeLogo"></i>
                <h2 id="WhyChooseUsText">Great Taste</h2>
                <p id="GreatTestText">Our cakes are very tasty and yummy. There are many different types of cake recipes and numerous ways of categorizing them. The general classification used is whether or not they contain fat, also known as shortening (not the be confused
                    solely with just processed shortening.</p>
            </div>
            <div class="col-md-4 item"><i class="glyphicon glyphicon-heart" id="HeartLogo"></i>
                <h2>Healthy & Organic</h2>
                <p id="HealthyText">Sugar confectionery includes sweets, candy, candied nuts, chocolates, chewing gum and bubblegum, sweetmeats, pastillage, and other confections that are made primarily of sugar. In some cases, chocolate confections (confections made of
                    chocolate) are treated </p>
            </div>
            <div class="col-md-4 item"><i class="fa fa-shopping-basket" id="BasketLogo"></i>
                <h2>Next Day Dalivery</h2>
                <p id="NextDayText">Confections are defined by the presence of sweeteners. These are usually sugars, but it is possible to buy sugar-free sweets, such as sugar-free peppermints. The most common sweetener for home cooking is </p>
            </div>
        </div>
    </div>
<!-- FlexSlider -->
 <div class="container site-section" id="welcome">
        <h1>Latest Cakes</h1>
        <div class="row">
        <?php
                        $getPd = $pd->getAllProduct3();
                        if ($getPd) {
                            while ($result = $getPd->fetch_assoc()) {
                                
                    ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="preview.php?proid=<?php echo $result['productId']?>"><img class="img-responsive" src="admin/<?php echo $result['image']?>" id="ChocoStraw" ></a>
                </div>
                <p><?php echo $result['productName'];?> </p>
            </div>
             <?php } } ?>
        </div>
    </div>
  <?php
    include 'inc/footer.php';
    ?>