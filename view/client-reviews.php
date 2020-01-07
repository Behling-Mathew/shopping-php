<?php
if (!$_SESSION['loggedin']) {
  header("Location: /acme");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Client Reviews View - Acme, Inc.</title>
    <meta name="description" content="This view displays all reviews left by the client.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
    <main class='admin'>
      <h1 class="welcome">Client Reviews</h1>

      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = NULL;
      }
      ?>
      <?php
      if ($_SESSION['loggedin'] === TRUE) {
        $fName = $_SESSION['clientData']['clientFirstname'];
        $lName = $_SESSION['clientData']['clientLastname'];
        $screenHeading = "<h3 id='screen-heading'>Under Screen Name <span class='screenName'>" . substr($fName, 0, 1) .
                $lName . "</span></h3>";
        echo $screenHeading;
      }
      ?>

      <?php
      if (isset($clientReviewsDisplay)) {
        echo $clientReviewsDisplay;
      }
      ?>
    </main>
    <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
</html>

