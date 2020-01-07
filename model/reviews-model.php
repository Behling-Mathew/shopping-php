<?php

/* 
 * Reviews Model
 */

//Insert a review

function insertReview($reviewText, $invId, $clientId) {
  // Create a connection object using the acme connection function
  $db = acmeConnect();
  // The SQL statement
  $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
  // Create the prepared statement using the acme connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  
  //Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

// Get reviews for a specific inventory item
function getReviewsByProduct($invId) {
  $db = acmeConnect();
  $sql = 'SELECT reviewId, reviewText, reviewDate, invId, clients.clientId, clientFirstname, clientLastname
            FROM reviews 
            JOIN clients 
            ON reviews.clientId = clients.clientId 
            WHERE invId = :invId
            ORDER BY reviewDate DESC';
  //* FROM reviews WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $productReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $productReviews;
}

// Get reviews written by a specific client
function getReviewsByClient($clientId) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM reviews WHERE clientId = :clientId ORDER BY reviewDate DESC';
  //categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  $stmt->execute();
  $clientReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientReviews;
}
// Get a specific review
function getReviewsById($reviewId) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewById = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewById;
}

// Update a specific review
function updateReview($reviewId, $reviewText, $invId, $clientId) {
  // Create a connection object using the acme connection function
  $db = acmeConnect();
  // The SQL statement
  $sql = 'UPDATE reviews
            SET reviewText = :reviewText, invId = :invId, clientId = :clientId
            WHERE reviewId = :reviewId';
  // Create the prepared statement using the acme connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  
  //Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

// Delete a specific review
function deleteReview($reviewId) {
// Create a connection
  $db = acmeConnect();
// The SQL statement to be used with the database
  $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;  
}

