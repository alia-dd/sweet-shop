<?php 
include "DB_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  echo $_SERVER['REQUEST_URI'];
  if(isset($_FILES['productimg'])) {

      $file_name = $_FILES['productimg']['name']; 
      $file_tmp = $_FILES['productimg']['tmp_name']; 

      $upload_dir = "uploads/"; 
      $target_file = $upload_dir . basename($file_name);
      $target = "C:/xampp/htdocs/testphp/";
      $sqltarget = $target .$upload_dir. basename($file_name);
      if (file_exists($target_file)) {
        unlink($target_file);} 
      else{
        
      }
      if(move_uploaded_file($file_tmp, $target_file)) {
          // echo "File uploaded successfully. Path: " . $sqltarget;
                 
    if(isset($_POST['productname']) && isset($_POST['productcategory']) && isset($_POST['price']) && isset($_POST['productdescription'])){
      // echo 'working on it.........';
      $productName = $_POST['productname'];
      $productCategory = $_POST['productcategory'];
      $productCategory2 = $_POST['productcategory2'];
      $numberOfProduct = $_POST['numberofproduct'];
      $price = $_POST['price'];
      $productDescription = $_POST['productdescription'];
      
      $checkExistingProductQuery = "SELECT * FROM sweets WHERE product_name='$productName' ";
      $result = mysqli_query($conn, $checkExistingProductQuery);

      if (mysqli_num_rows($result) === 1) {

          $productRow = mysqli_fetch_assoc($result);
          $number_of_product = $productRow['number_of_product'] + $numberOfProduct;
          $updateProductQuery = "UPDATE sweets SET number_of_product = $number_of_product WHERE product_name = '$productName'";
          mysqli_query($conn, $updateProductQuery);
      } else {
        
          $insertProductQuery = "INSERT INTO sweets(product_name, product_img, product_description, product_category, product_category2, number_of_product, price) 
          VALUES('$productName', LOAD_FILE('$sqltarget'), '$productDescription', '$productCategory', '$productCategory2', '$numberOfProduct', '$price')";

          if(mysqli_query($conn, $insertProductQuery)){
              
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      }      
    } else {
        echo "Required fields are not set.";
    }
      } else {
          echo "Error uploading file.";
      }
    } else {
        echo "No file uploaded or an error occurred.";
    }
  

} else {
}
?>
<script>
  function deleteProduct(productId, productName) {
    var confirmation = window.confirm("Are you sure you want to delete the product: " + productName + "?");

    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "methods/delete_product.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        console.log('Sending XMLHttpRequest to methods/delete_product.php'); 
        xhr.send("productId=" + productId);
        return;
    } else {
        console.log('Deletion cancelled.');
    }
  }

  function updateProduct(id, name, category, category2, quantity, price) {
    console.log('here/////////////'+name);
    document.getElementById('myForm').style.display = 'block';
    document.getElementById('productname').value = name;
    document.getElementById('productcategory').value = category;
    document.getElementById('productcategory2').value = category2;
    document.getElementById('numberofproduct').value = quantity;
    document.getElementById('price').value = price;
    document.getElementById('productdescription').value = id; 
    document.getElementById('productdescription').style.display = 'none'; 
    // document.getElementById('productimg').style.display = 'none';
    document.querySelector('.productdescription-label').style.display = 'none';
    // document.querySelector('productimg-label').style.display = 'none';
    
    
    var form = document.querySelector('form');
    form.setAttribute('action', 'methods/update_product.php');
    
    var productImgInput = document.getElementById('productimg');
    productImgInput.removeAttribute('required');
    
    
    var submitButton = form.querySelector('button[type=submit]');
    submitButton.textContent = 'Update Product';
    
  }
</script>



<?php
include "header.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px" lang="en">
  <head>
  <title>Product list</title>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="List.css" />
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    
    <!-- <link rel="stylesheet" href="Our-Product.css" media="screen" /> -->
    <script
      class="u-script"
      type="text/javascript"
      src="jquery-1.9.1.min.js"
      defer=""
    ></script>
    <script
      class="u-script"
      type="text/javascript"
      src="nicepage.js"
      defer=""
    ></script>
    <meta name="generator" content="Nicepage 6.2.4, nicepage.com" />
    <meta name="referrer" content="origin" />
    <link
      id="u-theme-google-font"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <link
      id="u-page-google-font"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    />
    
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="nicepage.css?version=9f2bb37a-73fa-4d9c-a52b-9817bd8612ae"
      media="screen"
    />
    <link
      href="./assets/css/theme.min.css"
      type="text/css"
      rel="stylesheet"
      id="style-default"
    />
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <meta charset="UTF-8" />
    <meta name="generator" content="Nicepage 6.2.4, nicepage.com" />
    <link
      id="u-theme-google-font"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <link
      id="u-page-google-font"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    />
    
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "",
        "logo": "images/sweet.png",
        "sameAs": [
          "https://facebook.com/name",
          "https://twitter.com/name",
          "https://instagram.com/name"
        ]
      }
    </script>
    
    <style>
    
      .delete-icon {
        fill: none;
        stroke: #ff0000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        width: 24px;
        height: 24px;
        cursor: pointer; 
      }

      
      .update-icon {
        fill: none;
        stroke: #007bff; 
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        width: 24px; 
        height: 24px;
        cursor: pointer;
      }
    </style>
    <meta name="theme-color" content="#478ac9" />
    <meta name="twitter:site" content="@" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="contact" />
    <meta name="twitter:description" content="" />
    <meta property="og:title" content="contact" />
    <meta property="og:type" content="website" />
    <meta data-intl-tel-input-cdn-path="intlTelInput/" />

    <link rel="stylesheet" href="List.css" />
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="Our-Product.css" media="screen" />
    <link
      href="./assets/css/theme.min.css"
      type="text/css"
      rel="stylesheet"
      id="style-default"
    />
        <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      
    </script>
    <script>
    function printData() {
        var printContent = document.querySelector(".app-content").innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;

        window.print();

        document.body.innerHTML = originalContent;
    }
    
</script>

<script>
  function filterData() {
    var searchInput = document.querySelector('.search-bar').value.toUpperCase();
    
    var productRows = document.querySelectorAll('.products-row');

    productRows.forEach(function(row) {
      var productName = row.querySelector('.product-cell.image span').textContent.toUpperCase();
      var category = row.querySelector('.product-cell.category span').textContent.toUpperCase();
      var category2 = row.querySelector('.product-cell.sales span').textContent.toUpperCase();

      if (productName.indexOf(searchInput) > -1 || category.indexOf(searchInput) > -1 || category2.indexOf(searchInput) > -1) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  document.querySelector('.search-bar').addEventListener('input', filterData());
</script>


  </head>
  <body
  data-path-to-root="./"
    data-include-products="false"
    class="u-body u-xl-mode"
    data-lang="en">



        <div class="app-content" >
            <div class="app-content-header">

              <button class="app-content-headerButton mode-switch" onclick="printData()">
                  Print
              </button>
              <button class="app-content-headerButton" onclick="openForm()">
                  Add Product
              </button>
            </div>

            <div class="app-content-actions">
          <input class="search-bar" placeholder="Search..." type="text" onchange="filterData()"/>
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper" style="display: none">
              <button class="action-button filter jsFilter">
              
              </button>
             
            </div>
            <button class="action-button list " title="List View">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-list"
              >
                <line x1="8" y1="6" x2="21" y2="6" />
                <line x1="8" y1="12" x2="21" y2="12" />
                <line x1="8" y1="18" x2="21" y2="18" />
                <line x1="3" y1="6" x2="3.01" y2="6" />
                <line x1="3" y1="12" x2="3.01" y2="12" />
                <line x1="3" y1="18" x2="3.01" y2="18" />
              </svg>
            </button>
                <button class="action-button grid active" title="Grid View">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-grid"
                  >
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                  </svg>
                </button>
              </div>
            </div>


            <div class="products-area-wrapper gridView">
                <div class="products-header">
                  <div class="product-cell image">
                    Items
                    <button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="product-cell status-cell">
                    description<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="product-cell category">
                    Category<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="product-cell sales">
                    Category2<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="product-cell price">
                    Price<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="product-cell price">
                  Update<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div>
                  <!-- <div class="product-cell price">
                  Delete<button class="sort-button">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                      </svg>
                    </button>
                  </div> -->
                </div>
<!-- ////////////////////////////// -->
      <?php
                  mysqli_set_charset($conn, "utf8");

                  $query = "SELECT * FROM sweets;";
                  $result = mysqli_query($conn, $query);

                  if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          
                ?>
                <div class="products-row">
                  <button class="cell-more-button">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="18"
                      height="18"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-more-vertical"
                    >
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </button>
                  <?php
                        if ($row['product_img']) {
                            $imageData = base64_encode($row['product_img']);
                            $imageSrc = "data:image/jpeg;base64," . $imageData;
                            ?>
                            <div class="product-cell image u-image">
                    <img
                      src="<?php echo $imageSrc; ?>"
                      alt="product"
                    />
                            <!-- <div alt="" class="u-align-center u-image u-image-circle u-image-1" data-image-width="183" data-image-height="275" style="background-image: url('<?php echo $imageSrc; ?>');"></div> -->
                            <?php
                        }
                        ?>
                  
                    <span><?php echo $row['product_name']; ?></span>
                  </div>
                  <!-- <div class="product-cell status-cell">
                    <span class="cell-label">description:</span> -->
                    <!-- <?php echo $row['product_name']; ?> -->
                  <!-- </div> -->
                  <div class="product-cell category">
                    <span class="cell-label">Category:</span><?php echo $row['product_category']; ?>
                  </div>
                  <div class="product-cell sales">
                    <span class="cell-label">Category2:</span><?php echo $row['product_category2']; ?>
                  </div>
                  <div class="product-cell sales">
                    <span class="cell-label">Quantity:</span><?php echo $row['number_of_product']; ?>
                  </div>
                  <div class="product-cell price">
                    <span class="cell-label">Prices:</span><?php echo "$".$row['price']; ?>
                  </div>
                  <!-- <div class="product-cell price"  onclick="updateproduct('<?php echo $row['id']; ?>')">
                 -->
                 <div class="product-cell price">
                   
                    <div class="product-cell"  onclick="updateProduct(
                  '<?php echo $row['id']; ?>', 
                  '<?php echo $row['product_name']; ?>',
                  '<?php echo $row['product_category']; ?>',
                  '<?php echo $row['product_category2']; ?>',
                  '<?php echo $row['number_of_product']; ?>',
                  '<?php echo $row['price']; ?>'
                )">
                      <span class="cell-label">Update:</span>
                      <svg class="update-icon" viewBox="0 0 24 24">
                        <path d="M12 2V22M4.93 11.08L4 17l5.92-.93M19.07 12.92L20 7l-5.92.93"/>
                      </svg>
                    </div>
                    <div class="product-cell sales" onclick="deleteProduct('<?php echo $row['id']; ?>', '<?php echo $row['product_name']; ?>')">
                      <span class="cell-label">Delete:</span>
                      <svg class="delete-icon" viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M10 6V3a1 1 0 011-1h2a1 1 0 011 1v3m1 0v10a2 2 0 01-2 2H8a2 2 0 01-2-2V6m1 0h8" />
                        <line x1="9" y1="11" x2="9" y2="17" />
                        <line x1="15" y1="11" x2="15" y2="17" />
                      </svg>
                    </div>
                  </div>
                </div>

                <?php }
                mysqli_free_result($result);
              } else {
                  echo "Error: " . mysqli_error($conn);
              }

                mysqli_close($conn);
           
           ?>
          

                
            </div>
        </div>


    <div class="form-popup" id="myForm">
      <section
        class="u-align-center u-clearfix u-block-7348-1 u-white"
        custom-posts-hash="[]"
        data-style="blank"
        id="carousel_8fb0"
        data-source="functional_fix"
        data-id="7348"
        data-manual-length-set="true"
      >
        <img
          class="u-image u-image-contain u-block-control u-align-center u-image-default u-block-7348-13"
          alt=""
          data-image-width="1280"
          data-image-height="1276"
          data-block="28"
          onclick="closeForm()"
          style="
            width: 25.9999px;
            height: 26px;
            position: absolute;
            top: 5px;
            right: 0;
          "
          data-block-type="Image"
          src="images/cancel.png"
        />

        <div
          class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-login-control u-form-1"
        >
          <?php if(!empty($error_msg)){ ?>
          <div class="alert-danger"><?php echo $error_msg; ?></div>
          <?php } ?>

          <?php if(!empty($info_msg)){ ?>
          <div class="alert-info"><?php echo $info_msg; ?></div>
          <?php } ?>
<!-- ................./////////////////// -->
          <form
            action="ProductList.php"
            method="POST"
            enctype="multipart/form-data"
            class="u-clearfix u-form-custom-backend u-form-spacing-20 u-form-vertical u-inner-form u-white"
            source="custom"
            name="form"
            role="form"
            style="
              padding: 20px;
              margin-top: 35px;
              margin-left: 0px;
              width: calc(100%);
            "
          >
            <div class="u-form-group u-form-name">
              <label for="name" class="form-label">product name</label>
              <input
                type="text"
                placeholder="Enter a Product Name"
                id="productname"
                name="productname"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="name" class="form-label">Product Category</label>
              <input
                type="text"
                placeholder="Enter a Product Category"
                id="productcategory"
                name="productcategory"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="phone" class="form-label">Second Product Category</label>
              <input
                type="text"
                placeholder="Enter a Second Product Category"
                id="productcategory2"
                name="productcategory2"
                class="form-control form-icon-input"
   
              />
            </div>

            <div class="u-form-group u-form-name">
              <label for="email" class="form-label">Product Quantity</label>
              <input
                type="text"
                placeholder="Enter The Quantity Of Products"
                id="numberofproduct"
                name="numberofproduct"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="username" class="form-label">Product Price</label>
              <input
                type="text"
                placeholder="Enter The price"
                id="price"
                name="price"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="row g-3 mb-3 u-form-group u-form-password">
              <div class="col-xl-5">
                <label class="productdescription-label" for="password">Product Description</label
                ><textarea name="productdescription"
                  id="productdescription"
                placeholder="Enter a Short Description" 
                cols="40" rows="3"
                required=""
                >
              </textarea>
                <!-- <input
                  class="form-control form-icon-input"
                  id="productdescription"
                  type="comment"
                  placeholder="Enter a Short Description"
                  name="productdescription"
                /> -->
              </div>
              <div class="col-xl-6">
                <label class="productimg-label" for="confirmPassword"
                  >Product Image</label
                ><input
                  class="form-control form-icon-input"
                  id="productimg"
                  type="file"
                  placeholder="Choose an Image for the Product"
                  name="productimg"
                  required=""
                />
              </div>
            </div>
            
          

            <div class="u-align-left u-form-group u-form-submit">
              <button type="submit" class="btn btn-primary w-100 mb-3">
               Add New Product
              </button>
            </div>
            <input type="hidden" value="" name="recaptchaResponse" />
          </form>
        </div>
      </section>

    </div>
     <div class="form-popup" id="myForm">
      <section
        class="u-align-center u-clearfix u-block-7348-1 u-white"
        custom-posts-hash="[]"
        data-style="blank"
        id="carousel_8fb0"
        data-source="functional_fix"
        data-id="7348"
        data-manual-length-set="true"
      >
        <img
          class="u-image u-image-contain u-block-control u-align-center u-image-default u-block-7348-13"
          alt=""
          data-image-width="1280"
          data-image-height="1276"
          data-block="28"
          onclick="closeForm()"
          style="
            width: 25.9999px;
            height: 26px;
            position: absolute;
            top: 5px;
            right: 0;
          "
          data-block-type="Image"
          src="images/cancel.png"
        />

        <div
          class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-login-control u-form-1"
        >
          <?php if(!empty($error_msg)){ ?>
          <div class="alert-danger"><?php echo $error_msg; ?></div>
          <?php } ?>

          <?php if(!empty($info_msg)){ ?>
          <div class="alert-info"><?php echo $info_msg; ?></div>
          <?php } ?>
<!-- ................./////////////////// -->
          <form
            action="ProductList.php"
            method="POST"
            enctype="multipart/form-data"
            class="u-clearfix u-form-custom-backend u-form-spacing-20 u-form-vertical u-inner-form u-white"
            source="custom"
            name="form"
            role="form"
            style="
              padding: 20px;
              margin-top: 35px;
              margin-left: 0px;
              width: calc(100%);
            "
          >
            <div class="u-form-group u-form-name">
              <label for="name" class="form-label">product name</label>
              <input
                type="text"
                placeholder="Enter a Product Name"
                id="productname"
                name="productname"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="name" class="form-label">Product Category</label>
              <input
                type="text"
                placeholder="Enter a Product Category"
                id="productcategory"
                name="productcategory"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="phone" class="form-label">Second Product Category</label>
              <input
                type="text"
                placeholder="Enter a Second Product Category"
                id="productcategory2"
                name="productcategory2"
                class="form-control form-icon-input"
   
              />
            </div>

            <div class="u-form-group u-form-name">
              <label for="email" class="form-label">Product Quantity</label>
              <input
                type="text"
                placeholder="Enter The Quantity Of Products"
                id="numberofproduct"
                name="numberofproduct"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="u-form-group u-form-name">
              <label for="username" class="form-label">Product Price</label>
              <input
                type="text"
                placeholder="Enter The price"
                id="price"
                name="price"
                class="form-control form-icon-input"
                required=""
              />
            </div>
            <div class="row g-3 mb-3 u-form-group u-form-password">
              <div class="col-xl-5">
                <label class="productdescription-label" for="password">Product Description</label
                ><textarea name="productdescription"
                  id="productdescription"
                placeholder="Enter a Short Description" 
                cols="40" rows="3"
                required=""
                >
              </textarea>
                <!-- <input
                  class="form-control form-icon-input"
                  id="productdescription"
                  type="comment"
                  placeholder="Enter a Short Description"
                  name="productdescription"
                /> -->
              </div>
              <div class="col-xl-6">
                <label class="productimg-label" for="confirmPassword"
                  >Product Image</label
                ><input
                  class="form-control form-icon-input"
                  id="productimg"
                  type="file"
                  placeholder="Choose an Image for the Product"
                  name="productimg"
                  required=""
                />
              </div>
            </div>
            
          

            <div class="u-align-left u-form-group u-form-submit">
              <button type="submit" class="btn btn-primary w-100 mb-3">
               Add New Product
              </button>
            </div>
            <input type="hidden" value="" name="recaptchaResponse" />
          </form>
        </div>
      </section>

    </div>



    
    <?php

include "footer.php";
?>
    <script src="scriptss.js"></script>
  </body>
</html>
