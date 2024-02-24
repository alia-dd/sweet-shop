<?php
include "../DB_connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productname'];
    $productCategory = $_POST['productcategory'];
    $productCategory2 = $_POST['productcategory2'];
    $numberOfProduct = $_POST['numberofproduct'];
    $price = $_POST['price'];
    $productId = $_POST['productdescription']; 
    echo "here,,,,,,,,$productId";
    $checkExistingProductQuery = "SELECT * FROM sweets WHERE id='$productId'";
    $result = mysqli_query($conn, $checkExistingProductQuery);

    if ($result && mysqli_num_rows($result) === 1) {
        $updateProductQuery = "UPDATE sweets SET 
            product_name = '$productName', 
            product_category = '$productCategory', 
            product_category2 = '$productCategory2', 
            number_of_product = '$numberOfProduct', 
            price = '$price'  
            WHERE id = '$productId'";

        if (mysqli_query($conn, $updateProductQuery)) {
            echo "Product updated successfully!";
            header("Location: ../ProductList.php");
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    } else {
        echo "Product with ID $productId not found!";
    }
} else {
    echo "This script should only be accessed via POST method.";
}
?>
