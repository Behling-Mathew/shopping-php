<!--/* /* 
 * New Product View
 * To add a new product to the inventory table 
 * Must contain a select dropdown list to enter the type of the new item.
 * This list should have been dynamically created from the database via a 
 * process in the controller and displayed in the view. 
 */-->
<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
<?php
  // Build the categories option list
  $catList = '<select name="categoryId" id="categoryId" required>';
  $catList .= "<option label='Choose A Category'></option>";
  foreach ($categories as $category) {
    $catList .= "<option value='$category[categoryId]'";
    if (isset($categoryId)) {
      if ($category['categoryId'] === $categoryId) {
        $catList .= ' selected ';
      }
    }
    $catList .= ">$category[categoryName]</option>";
  }
  $catList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product Page - Acme, Inc.</title>
    <meta name="description" content="This page allows the user to add a new product to the database.">
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
      <h1 class="welcome">Add Product</h1>

      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/acme/products/index.php">

        <fieldset>
          <h2>Insert New Product</h2>
          <label><?php echo $catList; ?></label>
          <label>Product Name<input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";}  ?> required></label>
          <label>Product Description</label>
          <!--<input type="text" name="invDescription" id="invDescription"  required></label>-->
          <textarea class="description" rows="10" cols="50" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo "$invDescription";}  ?></textarea>
          <label>Product Image<input type="text" name="invImage" id="invImage" value="../images/products/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required></label>
          <label>Product Thumbnail<input type="text" name="invThumbnail" id="invThumbnail" value="../images/products/no-image.png" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required></label>
          <label>Price<input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required></label>
          <label># in Stock<input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required></label>
          <label>Shipping Size (WxHxL in Inches)<input type="text" name="invSize" id="invSize" <?php if(isset($invSize)){echo "value='$invSize'";}  ?> required></label>
          <label>Weight (lbs.)<input type="text" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";}  ?> required></label>
          <label>Location (city name)<input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";}  ?> required></label>
          <label>Vendor Name<input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";}  ?> required></label>
          <label>Primary Material<input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";}  ?> required></label>

          <input type="submit" value="Add Product" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="addProduct">
        </fieldset>  
      </form>

    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>

