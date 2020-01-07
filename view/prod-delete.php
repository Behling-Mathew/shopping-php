<!--/* /* 
 * Product Update View 
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
    <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?>
    | Acme, Inc</title>
    <meta name="description" content="This page allows the user to delete products from the database.">
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
      <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>

      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/acme/products/index.php">

        <fieldset>
          <h2>Delete Product</h2>
          <label>Product Name<input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?> readonly></label>
          <label>Product Description</label>
          <!--<input type="text" name="invDescription" id="invDescription"  required></label>-->
          <textarea class="description" rows="10" cols="50" name="invDescription" id="invDescription" readonly><?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription'];} ?>
          </textarea>
          
          <input type="submit" value="Delete Product" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="deleteProd">
          <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
        </fieldset>  
      </form>

    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
</html>


