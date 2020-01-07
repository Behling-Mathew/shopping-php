<?php

/*
 * Reviews Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';
// Get the reviews model
require_once '../model/reviews-model.php';
require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();

// Call buildNav from custom library functions
$navList = buildNav($categories);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {


  case 'addNewReview':

    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_STRING);
    //$clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING);
    $clientId = $_SESSION['clientData']['clientId'];


    // Check for missing data
    if (empty($reviewText) || empty($invId) || empty($clientId)) {
      $message = '<p class="form-note">Error. Please provide information for all empty form fields.</p>';
      $_SESSION['message'] = $message;
      //include '../view/product-detail.php';
      header('Location: /acme/products/?action=viewProduct&invId=' . $invId . "'");
      exit;
    }
    // Send the data to the model
    $reviewOutcome = insertReview($reviewText, $invId, $clientId);

    //Get reviews specific to product based on invId
    $productReviews = getReviewsByProduct($invId);

    // Check and report the result
    if ($reviewOutcome === 1) {

      $message = "<p class='form-note'>Your review has been successfully recorded!</p>";
      //call buildReviews Function
      $reviewsDisplay = buildReviews($productReviews);
      header('Location: /acme/products/?action=viewProduct&invId=' . $invId . "'");
      $_SESSION['message'] = $message;

      exit;
    } else {
      $message = "<p class='form-note'>Error.  The review was not added to the database.</p>";
      include '../view/product-detail.php';

      exit;
    }
    break;

  case 'viewReviews':
    $clientId = $_SESSION['clientData']['clientId'];
    $clientReviews = getReviewsByClient($clientId);

    $clientReviewsDisplay = buildClientReviews($clientReviews);
    if (!count($clientReviews)) {
      $message = "<p class='notice'>No reviews were retrieved.</p>";
      include '../view/client-reviews.php';
      exit;
    } else {
      $clientReviewsDisplay = buildClientReviews($clientReviews);
    }
    include '../view/client-reviews.php';
    break;

  case 'editReview':
    include '../view/new-prod.php';
    break;

  case 'updateView':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
    $toDelete = getReviewsById($reviewId);
    if (!count($toDelete)) {
      $message = "<p class='notice'>Sorry, this cannot be updated at this time.</p>";
      exit;
    } else {
      include '../view/review-update.php';
    }

    break;

  case 'updateReview':
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_STRING);
    $clientId = $_SESSION['clientData']['clientId'];

    $toDelete = getReviewsById($reviewId);

    // Check for missing data
    if (empty($reviewId) || empty($reviewText) || empty($invId) || empty($clientId)) {
      $message = '<p class="form-note">The review is empty.  Cannot update.</p>';
      $_SESSION['message'] = $message;
      //include '../view/review-update.php';
      header('Location: /acme/reviews/?action=updateView&reviewId=' . $reviewId ."'");
      exit;
    }
    // Send the data to the model
    $updateOutcome = updateReview($reviewId, $reviewText, $invId, $clientId);
    $productDetails = getProductInfo($invId);
    $invName = $productDetails['invName'];

    // Check and report the result
    if ($updateOutcome === 1) {
      $message = "<p class='form-note'>The update has been successfully recorded!</p>";
      header('Location: /acme/reviews/?action=viewReviews');
      $_SESSION['message'] = $message;
      exit;
    } else {
      $message = "<p class='form-note'>Error. The review was not updated.</p>";
      include '../view/product-detail.php';

      exit;
    }

    include '../view/new-prod.php';
    break;

  case 'deleteView':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
    $toDelete = getReviewsById($reviewId);
    if (!count($toDelete)) {
      $message = "<p class='notice'>Sorry, this cannot be deleted at this time.</p>";
    } else {
      include '../view/review-delete.php';
    }
    break;
  case 'deleteReview':
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = deleteReview($reviewId);

    if ($deleteResult) {
      $message = "<p class='notice'>The review was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      //include '../view/client-reviews.php';
      header('location: /acme/reviews/?action=viewReviews');
      exit;
    } else {
      $message = "<p class='notice'>Error: Review was not deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/reviews/');
      exit;
    }


    break;

  default:

    if ($_SESSION['loggedin'] === TRUE) {
      include '../view/admin.php';
    } else {
      header('location: /acme/products');
    }


    break;
}