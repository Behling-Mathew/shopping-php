<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $categoryName; ?> Products | Acme, Inc.</title>
    <meta name="description" content="This page displays category info and images for ACME Inc.">
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
      <h1 class="welcome category-heading"><?php echo $categoryName; ?> Products</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <?php
      if (isset($prodDisplay)) {
        echo $prodDisplay;
      }
      ?>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>