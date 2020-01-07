<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - Acme, Inc.</title>
    <meta name="description" content="This is the home page for all ACME products guaranteed to help you catch delicious roadrunners.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
    </header>
    <nav>
      <!--<?php //include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav.php'; ?>-->
      <?php echo $navList; ?>
      
    </nav>
    <main class>
      <h1 class="welcome">Welcome to Acme!</h1>
      <div class="rocket-container">
        <img class="rocket-feature" src="/acme/images/site/rocketfeature.jpg" alt="Red Rocket Blastoff"/>
        <div class="want-container">
          <h2><span class="rocket-heading">Acme Rocket</span></h2>
          <p>Quick lighting fuse</p>
          <p>NHTSA approved seat belts</p>
          <p>Mobile launch stand included</p>
          <p><a href="/acme/cart/"><img class="want-button" id="actionbtn" alt="Add to cart button" src="/acme/images/site/iwantit.gif"></a></p>
        </div>    
      </div>   
      <div class="rocket-reviews">
        <h2>Acme Rocket Reviews</h2>
        <ul>
          <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
          <li>"That thing was fast!" (4/5)</li>
          <li>"Talk about fast delivery." (5/5)</li>
          <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
          <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
        </ul>
      </div>
      <h2>Featured Recipes</h2>
      <div class="recipies">  
        <a href="#" title="Link to Pulled Roadrunner BBQ Recipe">
          <div class="img-container">    
            <img class="recipie-img" src="/acme/images/recipes/bbqsand.jpg" alt="Pulled Roadrunner BBQ Meal">
          </div>     
          <p>Pulled Roadrunner BBQ</p>
        </a>
        <a href="#" title="Link to Roadrunner Pot Pie Recipe">
          <div class="img-container">
            <img class="recipie-img" src="/acme/images/recipes/potpie.jpg" alt="Roadrunner Pot Pie Meal">
          </div>
          <p>Roadrunner Pot Pie</p>
        </a>
        <a href="#" title="Link to Roadrunner Soup Recipe">
          <div class="img-container">
            <img class="recipie-img" src="/acme/images/recipes/soup.jpg" alt="Roadrunner Soup Meal">
          </div>
          <p>Roadrunner Soup</p>
        </a>
        <a href="#" title="Link to Roadrunner Tacos Recipe">
          <div class="img-container">
            <img class="recipie-img" src="/acme/images/recipes/taco.jpg" alt="Roadrunner Tacos Meal">
          </div>
          <p>Roadrunner Tacos</p>
        </a>
      </div>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
</html>