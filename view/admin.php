<?php
   if(!$_SESSION['loggedin']){
     header("Location: /acme");
     exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin View - Acme, Inc.</title>
    <meta name="description" content="This is the admin view to display a user's privileges.">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
    <main class='admin'>
      <h1 class="welcome">Admin Page</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <?php
        if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        }
        ?>
      <?php
      if($_SESSION['loggedin'] === TRUE){
        $fName = $_SESSION['clientData']['clientFirstname'];
        $lName = $_SESSION['clientData']['clientLastname'];
        $email = $_SESSION['clientData']['clientEmail'];
        $userLvl = $_SESSION['clientData']['clientLevel'];
        
        $fullName = '<h1>' . $fName . ' ' . $lName . '</h1>';
        echo $fullName;
        $loggedIn = '<p>You are logged in.</p>';
        echo $loggedIn;
        $list = '<ul>';
        $list .= '<li>First Name: ' . $fName . '</li>'; 
        $list .= '<li>Last Name: ' . $lName . '</li>';
        $list .= '<li>Email Address: ' . $email . '</li>';
        //$list .= '<li>Client Level: ' . $userLvl . '</li>';
        $list .= '</ul>';
        echo $list;
        $updateLink = '<a href="../accounts/index.php?action=client" title="Update Account"><p>Update Account Information</p></a>';
        echo $updateLink;
        $viewReviews = '<a href="../reviews/index.php?action=viewReviews" title="View Account Reviews"><p>View Account Reviews</p></a>';
        echo $viewReviews;
        if($userLvl > 1){
        $adminIntro = '<h1>Administrative Functions</h1>';
        $adminIntro .= '<p>Click the button below to manage products.<br></p>';
        echo $adminIntro;
        $link = '<a href="/acme/products" title="Products"><p class="admin-link">Products</p></a>';
        echo $link;
        
      }
      }?>
    </main>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
    </footer>
    <script src="/acme/js/hamburger.js"></script>    
  </body>
