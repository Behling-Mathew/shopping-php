<!DOCTYPE html>
<html lang="en">
  <head>
    <title>500 Error - Acme, Inc.</title>
    <meta name="description" content="This is the error page for ACME, Inc.  If you are here, something went wrong.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>     
    </header>
    <nav>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav.php'; ?>
    </nav>
    <main class="default-main">
      <h1 class="welcome default-heading">Server Error</h1>
      <p>The server has experienced a problem.</p>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>