
<a href="/acme/index.php">
  <img class="header-logo" src="/acme/images/site/logo.gif" width="150" alt="ACME Logo">
</a>

<div class="folder-container">
  <?php
//  if (isset($cookieFirstname)) {
//    echo "<span class='welcome-cookie'>Welcome, $cookieFirstname!</span>";
//  }
//  ?>
  <?php
  if (isset($_SESSION['clientData']['clientFirstname'])) {
    echo "<a href='/acme/accounts/'><span class='welcome-cookie'>Welcome, " . $_SESSION['clientData']['clientFirstname'] . "!</span></a>";
    
  }
  ?>

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    echo '<a class="logout" href="/acme/accounts/index.php?action=Logout" title="logout">Logout</a>';
  } else {
    echo '<a class="account-icon" href="/acme/accounts/index.php?action=login" title="Account Menu">
      <img class="account-icon" src="/acme/images/site/account.gif" width="30" alt="Account Icon"/>
      <p class="my-account">My Account</p>
    </a>';
  }
  ?>
</div> 

