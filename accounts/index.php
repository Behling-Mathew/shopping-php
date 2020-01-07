<?php
/* 
 * Accounts Controller
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
 
 // Get the array of categories
 $categories = getCategories();
 //var_dump($categories);
  //exit;
 
// Call buildNav from custom library functions
$navList = buildNav($categories);

  // Collect form values
// $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
// $clientLastname = filter_input(INPUT_POST, 'clientLastname');
// $clientEmail = filter_input(INPUT_POST, 'clientEmail');
// $clientPassword = filter_input(INPUT_POST, 'clientPassword');

 
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 
 switch ($action){
 case 'login':
   include '../view/login.php';
   break;
 case 'newAccount':
   include '../view/registration.php';
   break;
 case 'register':
   //echo 'You are in the reigster case statement.';
   //filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    
    $existingEmail = checkExistingEmail($clientEmail);
    // Check for an existing email address
    if($existingEmail){
      $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
     }
    
    
    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
     $message = '<p>Please provide information for all empty form fields.</p>';
     include '../view/registration.php';
     exit; 
    }
    
    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
    
    // Check and report the result
    if($regOutcome === 1){
     //setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
     $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
     //include '../view/login.php';
     header('Location: /acme/accounts/?action=login');
     exit;
    } else {
     $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
     include '../view/registration.php';
     exit;
    }
  break;
  
 case 'Login2':

   $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientEmail = checkEmail($clientEmail);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $checkPassword = checkPassword($clientPassword);

// Run basic checks, return if errors
    if (empty($clientEmail) || empty($checkPassword)) {
      $message = '<p>Please provide a valid email address and password.</p>';
      include '../view/login.php';
      exit;
    }

// A valid password exists, proceed with the login process
// Query the client data based on the email address
    $clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
    if (!$hashCheck) {
      $message = '<p class="notice">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }
// A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
    array_pop($clientData);
// Store the array into the session
    $_SESSION['clientData'] = $clientData;
// Send them to the admin view
    include '../view/admin.php';
    exit;
    break;
    
 case 'Logout':
   session_destroy();
   header('Location: ../../acme/');
   break;
 
 case 'client':
   include '../view/client-update.php';
   exit;
   break;
 
 case 'update-client':
   
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
   $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientEmail = checkEmail($clientEmail);
    
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
      $message = '<p class="notify">Please make sure the form data is filled out.</p>';
      include '../view/client-update.php';
      exit;
    } 
    if ($clientEmail !== $_SESSION['clientData']['clientEmail']) {
      $existingEmail = checkExistingEmail($clientEmail);
    // Check for an existing email address
    if($existingEmail){
      $message = '<p class="notify">That email address is already registered.</p>';
      include '../view/client-update.php';
      exit;
     }
      
    }
    
    // send to model
    $updateResult = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);
    
    if ($updateResult) {
      $clientData = refreshClient($clientId);
      $_SESSION['clientData'] = $clientData;
      $message = "<p class='notify'>Congratulations, your account was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/accounts/');
      exit;
      
    } else {
      $message = "<p class='notify'>Error. Your account was not updated.</p>";
      include '../view/client-update.php';
      exit;
    }

    break;
    
 case 'update-password':
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $checkPassword = checkPassword($clientPassword);
   // Run basic checks, return if errors
    if (empty($checkPassword)) {
      $message = '<p class="notify">Please meet the password requirements.</p>';
      include '../view/client-update.php';
      exit;
    }
    if (!$checkPassword) {
      $message = '<p class="notify">Password criteria not met.</p>';
      include '../view/client-update.php';
      exit;
    }
    
    // Hash password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    $result = updatePassword($clientId, $hashedPassword);
    
    if ($result) {
      $message = "<p class='notify'>Your password has been successfully updated.</p>";
      $_SESSION['message'] = $message;
      
     
      header('location: /acme/accounts/');
      exit;
      
    } else {
      $message = "<p class='notify'>Error. Your password was not updated.</p>";
      include '../view/client-update.php';
      exit;
    }

    break;

 default:
   include '../view/admin.php';
  
}