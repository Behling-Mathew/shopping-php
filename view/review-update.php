<?php
if (!$_SESSION['loggedin']) {
  header("Location: /acme");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Review View - Acme, Inc.</title>
    <meta name="description" content="This view allows the client to update an existing review.">
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
      <h1 class="welcome">Update Review</h1>
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
      <?php
      if (isset($clientReviewsDisplay)) {
        echo $clientReviewsDisplay;
      }
      ?>

      <form method='post' action='/acme/reviews/'>
        <fieldset>
          <textarea class='description' rows='10' cols='45' name='reviewText' id='reviewText'><?php if (isset($reviewText)) {
        echo $reviewText;
      } elseif (isset($toDelete['reviewText'])) {
        echo $toDelete['reviewText'];
      } ?></textarea>
          <input type='submit' value='Update Review' class='submit-button'>
          <input type='hidden' name='action' value='updateReview'>
          <input type='hidden' name='reviewId' value="<?php if (isset($toDelete['reviewId'])) {
        echo $toDelete['reviewId'];
      } elseif (isset($reviewId)) {
        echo $reviewId;
      } ?>">
          <input type='hidden' name='invId' value="<?php if (isset($toDelete['invId'])) {
        echo $toDelete['invId'];
      } elseif (isset($invId)) {
        echo $invId;
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

