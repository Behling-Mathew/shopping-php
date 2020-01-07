<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration Page - Acme, Inc.</title>
    <meta name="description" content="This is the official registration page of ACME, Inc. to create an accout with an email address and password.">
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
    <main class="default-main">
      <h1 class="welcome">Acme Registration</h1>
      
      <?php
        if (isset($message)) {
        echo $message;
        }
        ?>
      <form method="post" action="/acme/accounts/index.php">
        
        <fieldset>
          <h2>All fields are required.</h2>
          <label>First Name<input type="text" name="clientFirstname" id="clientFirstname" placeholder="Wylie" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required></label>
          <label>Last Name<input type="text" name="clientLastname" id="clientLastname" placeholder="Coyote" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required></label>
          <label>Email Address<input type="email" name="clientEmail" id="clientEmail" placeholder="roadrunner@acme.com" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required></label>
          <label for="clientPassword">Password</label> 
          <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
          <p class="pw-requirements">*Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter, and 1 special character<p>
          <input type="submit" value="Register" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="register">
        </fieldset>  
        
      </form>
     
      
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
