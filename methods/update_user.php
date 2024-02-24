<?php
include "../DB_connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $userid = $_POST['uid'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm-password'];
    echo "here,,,,,,,,$name";
    $checkExistingProductQuery = "SELECT * FROM users_tbl WHERE id='$userid'";
    $result = mysqli_query($conn, $checkExistingProductQuery);
    if($_POST['confirm-password'] != $_POST['confirm-password']){
        header("Location: ../ProductList.php");
    }else{
        if ($result && mysqli_num_rows($result) === 1) {
            $updateProductQuery = "UPDATE users_tbl SET 
                name = '$name', 
                user = '$user', 
                phone = '$phone', 
                email = '$email', 
                username = '$username',
                password = '$password'  
                WHERE id = '$userid'";

    
            if (mysqli_query($conn, $updateProductQuery)) {
                echo "user updated successfully!";
                header("Location: ../User-List.php");
            } else {
                echo "Error updating user: " . mysqli_error($conn);
            }
        } else {
            echo "user with ID $productId not found!";
        }
    }
} else {
    echo "This script should only be accessed via POST method.";
}
?>
