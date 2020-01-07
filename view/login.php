<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page - Acme, Inc.</title>
    <meta name="description" content="This is the official login page of ACME, Inc.">
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
      <h1 class="welcome">Acme Login</h1>
      <?php
        if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = NULL;
        }
        ?>
      <form method="post" action="/acme/accounts/">
        <fieldset>
          <label>Email Address<input type="email" name="clientEmail" id="clientEmail" placeholder="roadrunner@acme.com" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required></label>
          <label>Password<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label> 
          <p class="pw-requirements">*Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter, and 1 special character<p>
          <input type="submit" value="Login" class="submit-button">
          <input type="hidden" name="action" value="Login2">
        </fieldset>  
        
      </form>
      <h2 class="login-h2">Not a member?</h2>
      <a href='/acme/accounts/index.php?action=newAccount' title="Create Account">
        <p class="register-button">Create an Account</p></a>
      
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>