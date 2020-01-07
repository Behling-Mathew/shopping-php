<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Image Management - Acme, Inc.</title>
    <meta name="description" content="This is the image admin page for ACME, Inc.">
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
      <h1 class="welcome">Image Management</h1>
      <h2>Add New Product Image</h2>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form action="/acme/uploads/" method="post" enctype="multipart/form-data">
        <label for="invItem">Product</label><br>
        <?php echo $prodSelect; ?><br><br>
        <label>Upload Image:</label><br>
        <input type="file" name="file1"><br>
        <input type="submit" class="regbtn" value="Upload">
        <input type="hidden" name="action" value="upload">
      </form>
      <hr>
      <h2>Existing Images</h2>
      <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
      <?php
      if (isset($imageDisplay)) {
        echo $imageDisplay;
      }
      ?>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
</html>
<?php unset($_SESSION['message']); ?>
