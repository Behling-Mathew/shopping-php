<!--/* /* 
 * Product Update View 
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
    } elseif(isset($prodInfo['categoryId'])){
      if($category['categoryId'] === $prodInfo['categoryId']){
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
    <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?>
    | Acme, Inc</title>
    <meta name="description" content="This page allows the user to update products in the database.">
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
      <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>

      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/acme/products/index.php">

        <fieldset>
          <h2>Modify Product</h2>
          <label><?php echo $catList; ?></label>
          <label>Product Name<input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?> required></label>
          <label>Product Description</label>
          <!--<input type="text" name="invDescription" id="invDescription"  required></label>-->
          <textarea class="description" rows="10" cols="50" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){ echo $invDescription; }
            elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?>
          </textarea>
          <label>Product Image<input type="text" name="invImage" id="invImage"  <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; } ?> required></label>
          <label>Product Thumbnail<input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; } ?> required></label>
          <label>Price<input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; } ?>  required></label>
          <label># in Stock<input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; }  ?> required></label>
          <label>Shipping Size (WxHxL in Inches)<input type="text" name="invSize" id="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; }  ?> required></label>
          <label>Weight (lbs.)<input type="text" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }  ?> required></label>
          <label>Location (city name)<input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }  ?> required></label>
          <label>Vendor Name<input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }  ?> required></label>
          <label>Primary Material<input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }  ?> required></label>

          <input type="submit" value="Update Product" class="submit-button">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="updateProd">
          <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
        </fieldset>  
      </form>

    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>

