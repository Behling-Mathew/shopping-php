<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $invName; ?> Details | Acme, Inc.</title>
    <meta name="description" content="This page displays the product details for ACME Inc.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>  

    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
    <main class="default-main" id="prod-display">
      <h1 class="welcome category-heading"><?php echo $invName ?> Details and Reviews</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = NULL;
      }
      ?>
      <div class="info-cont">
        <?php
        if (isset($detailsDisplay)) {
          echo $detailsDisplay;
        }
        ?>
      </div>
      <hr>
      <h3>Product Thumbnails</h3>
      <?php
      if (isset($thumbnailDisplay)) {
        echo $thumbnailDisplay;
      }
      ?>
      <hr>
      <h3>Leave Review</h3>
      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {

        $clientId = $_SESSION['clientData']['clientId'];
        $screenName = substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname'];
        $reviewForm = "<form method='post' action='/acme/reviews/'>";
        $reviewForm .= "<fieldset class='review-form'>";
        $reviewForm .= "<h2>Review Product</h2>";
        $reviewForm .= "<label>Screen Name<input type='text' name='screenName' id='screenName' value='" . $screenName . "' readonly></label>";
        $reviewForm .= "<textarea class='description' rows='10' cols='45' name='reviewText' id='reviewText' required></textarea>";
        $reviewForm .= "<input type='submit' value='Submit Review' class='submit-button'>";
        $reviewForm .= "<input type='hidden' name='invId' value='" . $invId . "'>";
        $reviewForm .= "<input type='hidden' name='action' value='addNewReview'>";
        $reviewForm .= "</fieldset>";
        $reviewForm .= "</form>";
        echo $reviewForm;
      } else {
        echo "<p id='center-login'><span class='login-btn'><a href='/acme/accounts/index.php?action=login' title='Account Menu'>Login</a></span> to add review</p>";
      }
      ?>
      <hr>
      <h3>Previous Customer Reviews</h3>
<?php
if (isset($reviewsDisplay)) {
  echo $reviewsDisplay;
}
?>
    </main>
    <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>