<!--/* 
 * New Category View
 * To add a new category to the categories table
 * The view only requires s new name because the acme categories table uses an 
 * auto-incrementing field for the id
 */-->
<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Category Page - Acme, Inc.</title>
    <meta name="description" content="This page allows the user to add a category to the database.">
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
      <h1 class="welcome">Add Category</h1>

      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/acme/products/index.php">

        <fieldset>
          <h2>Insert New Category</h2>
          <label>Category Name<input type="text" name="categoryName" id="categoryName" <?php if(isset($categoryName)){echo "value='$categoryName'";}  ?> required></label>
          <input type="submit" value="Add Category" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="addCategory">
        </fieldset>  
      </form>
      
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>

