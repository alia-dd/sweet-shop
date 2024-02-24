<?php
include "../DB_connection.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["userId"])) {

      $userId = $_POST["userId"];
      echo "console.log($userId);";
      $deleteQuery = "DELETE FROM users_tbl WHERE id = $userId";
      if (mysqli_query($conn, $deleteQuery)) {
          echo "Product with ID $userId deleted successfully!";
          header("Location: ../User-List.php");
      } else {
          echo "Error deleting product: " . mysqli_error($conn);
      }
  } else {
      
  }
?>
