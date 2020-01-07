<!--/* 
 * Product Management View
 * This is a default view for the products application 
 * Contains two links to add a new category and add a new product
 * Both links should direct back to the products controller, passing a key-value
 * pair to direct the controller to provide the needed view.
 */-->
<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product Management Page - Acme, Inc.</title>
    <meta name="description" content="This product management page allows users to navigate to the new category or new product pages.">
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
      <h1 class="product-management">Product Management</h1>  
      <?php
        if (isset($message)) {
        echo $message;
        }
        ?>
      <p>Welcome to the product management page.  Please choose an option below:</p>
      <ul>
        <li><a href='/acme/products/index.php?action=viewNewCategory' title="View New Category Page">Add a New Category</a></li>
        <li><a href='/acme/products/index.php?action=viewNewProduct' title="New Product">Add a New Product</a></li>
      </ul> 
      <?php
      if (isset($message)) {
        echo $message;
      } if (isset($prodList)) {
        echo $prodList;
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


