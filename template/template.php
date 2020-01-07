<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Template Page - Acme, Inc.</title>
    <meta name="description" content="This is the template page for ACME, Inc where all pages will share a common header, navigation, and footer.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php //include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>  
      
    </header>
    <nav>
      <!--<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav.php'; ?>-->
      <?php echo $navList; ?>
    </nav>
    <main class="default-main">
      <h1 class="welcome">Content Title Here</h1>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>