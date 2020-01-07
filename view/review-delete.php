<?php
if (!$_SESSION['loggedin']) {
  header("Location: /acme");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Delete Review View - Acme, Inc.</title>
    <meta name="description" content="This view allows the client to permanently delete a review.">
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
      <h1 class="welcome">Confirm Delete</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      }
      ?> 
      <?php
      if (isset($clientReviewsDisplay)) {
        echo $clientReviewsDisplay;
      }
      ?>

      <form method='post' action='/acme/reviews/' onsubmit="return confirm('Are you sure you want to delete this review?  This cannot be undone.');">
        <fieldset>
          <textarea class='description' rows='10' cols='45' name='reviewText' id='reviewText' readonly><?php if (isset($reviewText)) {
        echo $reviewText;
      } elseif (isset($toDelete['reviewText'])) {
        echo $toDelete['reviewText'];
      } ?></textarea>
          <input type='submit' value='Delete Review' class='submit-button'>
          <input type='hidden' name='action' value='deleteReview'>
          <input type='hidden' name='reviewId' value="<?php if (isset($toDelete['reviewId'])) {
        echo $toDelete['reviewId'];
      } elseif (isset($reviewId)) {
        echo $reviewId;
      } ?>">

        </fieldset>
      </form>
    </main>
    <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
</html>

