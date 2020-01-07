<?php

/*
 * Products Model
 */

// This file needs 2 functions
// 1 - to add the new category to the acme categories table
// 2 - to add a new product to the acme inventory table
// Both functions must use PDO prepared statements in the solution code
// Add New Category to the categories table
function addCategory($categoryName) {
  // Create a connection object using the acme connection function
  $db = acmeConnect();
  // The SQL statement
  $sql = 'INSERT INTO categories (categoryName)
           VALUES (:categoryName)';
  // Create the prepared statement using the acme connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
  //Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

// Add a new product to the database
function newProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle) {
  // Create a connection object using the acme connection function
  $db = acmeConnect();
  // The SQL statement
  $sql = 'INSERT INTO inventory (categoryId, invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, invVendor, invStyle)
           VALUES (:categoryId, :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :invVendor, :invStyle)';
  // Create the prepared statement using the acme connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
  $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
  $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
  $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
  $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
  $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
  $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
  $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
  $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
  $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
  $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
  $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
  //Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

// This function gets basic product information from the inventory table for starting an update or delete process
function getProductBasics() {
  $db = acmeConnect();
  $sql = 'SELECT invName, invId, invVendor FROM inventory ORDER BY invName ASC';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $products;
}


//// Update a product in the database
//function updateProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle, $invId) {
//  // Create a connection object using the acme connection function
//  $db = acmeConnect();
//  // The SQL statement
//  $sql = 'UPDATE inventory SET categoryId = :categoryId, invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';
//  // Create the prepared statement using the acme connection
//  $stmt = $db->prepare($sql);
//  // The next four lines replace the placeholders in the SQL statement with the actual values in the variables
//  // and tells the database the type of data it is
//  $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
//  $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
//  $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
//  $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
//  $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
//  $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
//  $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
//  $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
//  $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
//  $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
//  $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
//  $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
//  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
//  //Insert the data
//  $stmt->execute();
//  // Ask how many rows changed as a result of our insert
//  $rowsChanged = $stmt->rowCount();
//  // Close the database interaction
//  $stmt->closeCursor();
//  // Return the indication of success (rows changed)
//  return $rowsChanged;
//}
// Update a product
function updateProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle, $invId) {
// Create a connection
  $db = acmeConnect();
// The SQL statement to be used with the database
  $sql = 'UPDATE inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
  $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
  $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
  $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
  $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
  $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
  $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
  $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
  $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
  $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
  $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
  $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

// Delete product function
function deleteProduct($invId) {
// Create a connection
  $db = acmeConnect();
// The SQL statement to be used with the database
  $sql = 'DELETE FROM inventory WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

// Get a list of products based on the category
function getProductsByCategory($categoryName) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $products;
}

// Get product information by invId
function getProductInfo($invId) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM inventory WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $prodInfo;
}
