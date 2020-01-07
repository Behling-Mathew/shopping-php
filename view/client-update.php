<?php
   if(!$_SESSION['loggedin']){
     header("Location: /acme");
     exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Client Update Page - Acme, Inc.</title>
    <meta name="description" content="This page allows a client to update their profile.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>   
    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
    <main class="default-main">
      <h1 class="welcome">Update Account</h1>
      <p>Use this form to update your name or email information.
      
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
      <form method="post" action="/acme/accounts/">

        <fieldset>
          <label for="clientFirstname">First Name<input type="text" name="clientFirstname" id="clientFirstname" 
            <?php if(isset($_SESSION['clientData']['clientFirstname'])){echo "value='".$_SESSION['clientData']['clientFirstname']."'";} ?> required></label>
          
          <label for="clientLastname">Last Name<input type="text" name="clientLastname" id="clientLastname" 
            <?php if(isset($_SESSION['clientData']['clientLastname'])) {echo "value='".$_SESSION['clientData']['clientLastname']."'"; } ?> required></label>
          
          <label for="clientEmail">Email Address<input type="email" name="clientEmail" id="clientEmail" 
            <?php if(isset($_SESSION['clientData']['clientEmail'])) {echo "value='".$_SESSION['clientData']['clientEmail']."'"; } ?> required></label>
          
          <input type="submit" value="Update Client" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="update-client">
          <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>">
        </fieldset>  
      </form>
      <h2 class="welcome">Update Password</h2>
      <form method="post" action="/acme/accounts/">
        <fieldset>
         <label for="clientPassword">Password<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" ></label>
          
          <p class="pw-requirements">*This will change your password.  New passwords must be at least 8 characters and contain at least 1 number, 1 capital letter, and 1 special character.<p>
          <input type="submit" value="Change Password" class="submit-button">
          <input type="hidden" name="action" value="update-password">
          <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>">
        </fieldset>  
      </form>
      
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>