<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ajaxtest');

echo 'Processing...';

// Check for GET variable
if (isset($_GET['name'])) {
  $name = $_GET['name'];
  if (preg_match("/^[a-zA-Z ]*$/", $name)) {
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    echo 'GET: your name is ' . $name;
  } else {
    echo 'Invalid name.';
  }
}

// Check for POST variable
if (isset($_POST['name'])) {
  // Ensure you're checking $_POST for POST requests
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  
  // Correct query with proper string quoting
  $query = "INSERT INTO users (name) VALUES ('$name')";
  
  if (mysqli_query($conn, $query)) {
    echo 'User Added...';
  } else {
    echo 'ERROR: ' . mysqli_error($conn);
  }
}

?>
