<?php

/*
 * Products Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the products model
require_once '../model/products-model.php';
// Get the reviews model
require_once '../model/reviews-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';

// Get the array of categories
$categories = getCategories();
// Call buildNav from custom library functions
$navList = buildNav($categories);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'viewNewCategory':
    include '../view/new-cat.php';
    break;
  case 'addCategory':
    $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);


    // Check for missing data
    if (empty($categoryName)) {
      $message = '<p class="form-note">Please provide information for all empty form fields.</p>';
      include '../view/new-cat.php';
      exit;
    }

    // Send the data to the model
    $catOutcome = addCategory($categoryName);

    // Check and report the result
    if ($catOutcome === 1) {
      header("Location: ../products/");
      exit;
    } else {

      $message = "<p class='form-note'>Adding the category failed.  Please try again.</p>";
      include '../view/categories.php';
      exit;
    }

    break;

  case 'viewNewProduct':
    include '../view/new-prod.php';
    break;
  case 'addProduct':
    $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_STRING);
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
    $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
    $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);

    // Check for missing data
    if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
      $message = '<p class="form-note">Please provide information for all empty form fields.</p>';
      include '../view/new-prod.php';
      exit;
    }
    // Send the data to the model
    $prodOutcome = newProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle);
    // Check and report the result
    if ($prodOutcome === 1) {
      $message = "<p class='form-note'>$invName has been successfully added to the database!</p>";
      include '../view/new-prod.php';
      exit;
    } else {
      $message = "<p class='form-note'>Error.  $invName was not added to the database.</p>";
      include '../view/new-prod.php';
      exit;
    }
    break;
  case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInfo = getProductInfo($invId);
    if (count($prodInfo) < 1) {
      $message = 'Sorry, no product information could be found.';
    }
    include '../view/prod-update.php';
    exit;
    break;

  case 'updateProd':
    $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
    $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
    $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
      $message = '<p>Please complete all information for the new item! Double check the category of the item.</p>';
      include '../view/prod-update.php';
      exit;
    } $updateResult = updateProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle, $invId);

    if ($updateResult) {
      $message = "<p class='notify'>Congratulations, $invName was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    } else {
      $message = "<p>Error. $invName was not updated.</p>";
      include '../view/prod-update.php';
      exit;
    }

    break;

  case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInfo = getProductInfo($invId);
    if (count($prodInfo) < 1) {
      $message = 'Sorry, no product information could be found.';
    }
    include '../view/prod-delete.php';
    exit;
    break;

  case 'deleteProd':
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteProduct($invId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invName was not deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    }
    break;

  case 'category':
    $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
    $products = getProductsByCategory($categoryName);
    if (!count($products)) {
      $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
    } else {
      $prodDisplay = buildProductsDisplay($products);
    }
    //echo $prodDisplay;
    //exit;
    include '../view/category.php';
    break;

  case 'viewProduct':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_STRING);
    $productDetails = getProductInfo($invId);
    //Get specific reviews
    $productReviews = getReviewsByProduct($invId);
    
    if (!count($productDetails)) {
      $message = "<p class='notice'>Sorry, $invId yields no details.</p>";
    } else {
      $detailsDisplay = buildProductDetails($productDetails);
      $invName = $productDetails['invName'];
      
      //call thumbnail function
      $thumbnailInfo = getThumbnail($invId);
      $thumbnailDisplay = buildThumbnailDisplay($thumbnailInfo);
      
      //call buildReviews Function
      $reviewsDisplay = buildReviews($productReviews);
    }
    //echo $detailsDisplay;
    //exit;


    include '../view/product-detail.php';
    break;



  default:
    $products = getProductBasics();
    if (count($products) > 0) {
      $prodList = '<table class="center-table">';
      $prodList .= '<thead>';
      $prodList .= '<tr><th>Product Name</th><th>Inventory Vendor</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $prodList .= '</thead>';
      $prodList .= '<tbody>';
      foreach ($products as $product) {
        $prodList .= "<tr><td>$product[invName]</td>";
        $prodList .= "<td>$product[invVendor]</td>";
        $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
        $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
      }
      $prodList .= '</tbody></table>';
    } else {
      $message = '<p class="notify">Sorry, no products were returned.</p>';
    }

    include '../view/prod-mgmt.php';
    break;
}