<?php
include "../DB_connection.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productId"])) {
      $productId = $_POST["productId"];

      $deleteQuery = "DELETE FROM sweets WHERE id = $productId";

      if (mysqli_query($conn, $deleteQuery)) {
          echo "Product with ID $productId deleted successfully!";
          header("Location: ../ProductList.php");
      } else {
          echo "Error deleting product: " . mysqli_error($conn);
      }
  } else {
      echo "Invalid request.";
  }
?>