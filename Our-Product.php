
<?php 
include "DB_connection.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo $_SERVER['REQUEST_URI'];
                    
    if(isset($_POST['productNameInput']) && isset($_POST['pricedynamicInput']) && isset($_POST['currentValueInput']) && isset($_POST['productcatdynamicInput'])){
      $nameValue = $_POST['productNameInput'];
      // $pricedynamic = $_POST['pricedynamicInput'];
       $pricedynamicInput = $_POST['pricedynamicInput'];

      $pricedynamic = (float) str_replace('$', '', $pricedynamicInput);
      $currentValue = $_POST['currentValueInput'];
      $productcatdynamic = $_POST['productcatdynamicInput'];
        echo $nameValue;
        echo $pricedynamic;
        echo $currentValue;
        echo $productcatdynamic;
      $checkExistingProductQuery = "SELECT * FROM cart WHERE product_name='$nameValue' ";
      $result = mysqli_query($conn, $checkExistingProductQuery);

        if (mysqli_num_rows($result) === 1) {
              echo "update..............<br>";
            $productRow = mysqli_fetch_assoc($result);
            $number_of_product = $productRow['quantity'] + $currentValue;
            $updateProductQuery = "UPDATE cart SET quantity = $number_of_product WHERE product_name = '$nameValue'";
            mysqli_query($conn, $updateProductQuery);
        } else {
          // echo "insert..............<br>";
          //     $inserttocart = "INSERT INTO cart (product_name, product_category, quantity, price)
          //     VALUES ($nameValue,$productcatdynamic,$currentValue,$pricedynamic);";
              
          //   if(mysqli_query($conn, $inserttocart)){
          //       echo"inserted....]]]]]]]]]]]]";
          //   } else {
          //       echo "Error: " . mysqli_error($conn);
          //   }
          
          $inserttocart = "INSERT INTO cart (product_name, product_category, quantity, price)
           VALUES($nameValue,$productcatdynamic,$currentValue,$pricedynamic);";

          if(mysqli_query($conn, $inserttocart)){
              
          } else {
              echo "Error: " . mysqli_error($conn);
          }
        }      
      } else {
          echo "Required fields are not set.";
      }
  } else {
  }

?>
<?php
include "header.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px" lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta
      name="keywords"
      content="​We make homemade breads and cakes, ​Baked fresh daily"
    />
    <meta name="description" content="" />
    <title>Our Product</title>
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="Our-Product.css" media="screen" />
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

    <script>
      function openForm1(imageName,productname,productprice,productdictrption) {
        if(document.getElementById("myForm").style.display != "none"){
          closeForm();
        }
        console.log(imageName, productname, productprice, productdictrption);
        document.getElementById("myForm").style.display = "block";
        document.getElementById("dynamicImage").src ="images/" + imageName;
        document.getElementById("productnamedynamic").text = productname;
        document.getElementById("pricedynamic").innerHTML  =productprice;
        document.getElementById("textdynamic").innerHTML  =productdictrption;

      }
  
      function openForm(button) {
        console.log("hello");
        const productImage = button.getAttribute('data-product-image'); 
        const productName = button.getAttribute('data-product-name');
        const productPrice = button.getAttribute('data-product-price');
        const productDescription = button.getAttribute('data-product-description');
        const productNumber = button.getAttribute('data-product-numbeter');
        const productCat = button.getAttribute('data-product-categ');
        document.getElementById("myForm").style.display = "block";
        document.getElementById("dynamicImage").src = productImage;
        document.getElementById("productnamedynamic").innerText = productName;
        document.getElementById("pricedynamic").innerText = productPrice;
        document.getElementById("textdynamic").innerHTML = productDescription;
        document.getElementById("productnumberdynamic").innerHTML  =productNumber;
        document.getElementById("productcatdynamic").innerHTML  =productCat;
        updateHiddenFields();
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("currentValue").innerHTML  =1;
      }

      document.addEventListener('DOMContentLoaded', function() {
        const decrementButton = document.getElementById('decrementButton');
        const incrementButton = document.getElementById('incrementButton');
        const currentValue = document.getElementById('currentValue');
        const productNumber = document.getElementById('productnumberdynamic');

        decrementButton.addEventListener('click', function() {
            let currentValueInt = parseInt(currentValue.textContent);
            if (currentValueInt > 1) {
                currentValueInt--;
                currentValue.textContent = currentValueInt;
                updateHiddenFields();
            }
        });

        incrementButton.addEventListener('click', function() {
            let currentValueInt = parseInt(currentValue.textContent);
            let productNumberInt = parseInt(productNumber.textContent);
            if (currentValueInt < productNumberInt) {
                currentValueInt++;
                currentValue.textContent = currentValueInt;
                updateHiddenFields();
            }
        });
      });
  
      console.log('Dynamic:............');  
    
      function updateHiddenFields() {
          var dynamicImageSrc = document.getElementById('dynamicImage').src;
          var productNameValue = document.getElementById('productnamedynamic').textContent;
          var pricedynamicValue = document.getElementById('pricedynamic').textContent;
          var currentValueValue = document.getElementById('currentValue').textContent;
          var productcatdynamicValue = document.getElementById('productcatdynamic').textContent;

          // Update hidden input fields
          document.getElementById('dynamicImageInput').value = dynamicImageSrc;
          document.getElementById('productNameInput').value = productNameValue;
          document.getElementById('pricedynamicInput').value = pricedynamicValue;
          document.getElementById('currentValueInput').value = currentValueValue;
          document.getElementById('productcatdynamicInput').value = productcatdynamicValue;

          // Log the values to console
          console.log('Price Dynamic:', pricedynamicValue);
          console.log('Product Number Dynamic:', currentValueValue);
          console.log('Product Cat Dynamic:', productcatdynamicValue);
      }
     
    
    </script>
    <!-- 683 -->

    
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
      * {
        box-sizing: border-box;
      }

      /* Button used to open the contact form - fixed at the bottom of the page */
      .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
      }
      .number_of_product{
        display: none;
      }
      /* The popup form - hidden by default */
      .form-popup {
        display: none;
        position: fixed;
        bottom: 95%;
        right: 15%;
        z-index: 9;
        width: 1000px;
        height: 10px;
      }
      .marginbuttons{
        margin-right:20px
      }


      /* Add styles to the form container */
      .form-container {
        max-width: 500px;
        padding: 10px;
        background-color: white;
      }

      /* Full-width input fields */
      .form-container input[type="text"],
      .form-container input[type="password"] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      /* When the inputs get focus, do something */
      .form-container input[type="text"]:focus,
      .form-container input[type="password"]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit/login button */
      .form-container .btn {
        background-color: #04aa6d;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
      }

      /* Add a red background color to the cancel button */
      .form-container .cancel {
        background-color: red;
      }

      /* Add some hover effects to buttons */
      .form-container .btn:hover,
      .open-button:hover {
        opacity: 1;
      }
    </style>

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
    <meta name="theme-color" content="#478ac9" />
    <meta name="twitter:site" content="@" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Our Product" />
    <meta name="twitter:description" content="" />
    <meta property="og:title" content="Our Product" />
    <meta property="og:type" content="website" />
    <meta data-intl-tel-input-cdn-path="intlTelInput/" />
  </head>
  <body
    data-path-to-root="./"
    data-include-products="false"
    class="u-body u-xl-mode"
    data-lang="en"
  >


 
<?php include "DB_connection.php";?>

    <section class="u-black u-clearfix u-section-1" id="carousel_e3a3">
      <div
        class="custom-expanded data-layout-selected u-clearfix u-layout-wrap u-layout-wrap-1"
      >
        <div class="u-layout">
          <div class="u-layout-row">
            <div
              class="u-container-style u-image u-layout-cell u-right-cell u-shape-rectangle u-size-60 u-image-1"
              data-image-width="1920"
              data-image-height="1282"
            >
              <div class="u-container-layout u-container-layout-1">
                <h2
                  class="u-align-center u-text u-text-body-alt-color u-text-1"
                >
                  From Gummies to Chocolates<br />
                </h2>
                <p class="u-align-center u-text u-text-white u-text-2">
                  Get Ready for a Sugar-Coated Adventure at Our Online Store
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section
      class="u-align-center u-clearfix u-white u-section-2"
      id="carousel_024e"
    >
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-1">store products</h2>
        <p
          class="u-align-center u-text u-text-grey-70 u-text-2"
          data-animation-name=""
          data-animation-duration="0"
          data-animation-delay="0"
          data-animation-direction=""
        >
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
          dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt.
        </p>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
          <?php
            mysqli_set_charset($conn, "utf8");

            $query = "SELECT * FROM sweets;";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" style="display: flex; flex-direction: column; align-items: center; padding-top: 20px;">
                        <?php
                        if ($row['product_img']) {
                            $imageData = base64_encode($row['product_img']);
                            $imageSrc = "data:image/jpeg;base64," . $imageData;
                            ?>
                            <div alt="" class="u-align-center u-image u-image-circle u-image-1" data-image-width="183" data-image-height="275" style="background-image: url('<?php echo $imageSrc; ?>');"></div>
                            <?php
                        }
                        ?>
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: flex-end;">
                            <h4 class="u-align-center u-text u-text-3"><?php echo $row['product_name']; ?></h4>
                            <h5 class="u-align-center u-custom-font u-text u-text-font u-text-palette-5-base u-text-4">$<?php echo $row['price']; ?></h5>
                            <button class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-1"
                                    data-product-image="<?php echo $imageSrc; ?>"
                                    data-product-name="<?php echo $row['product_name']; ?>"
                                    data-product-price="<?php echo '$'.$row['price']; ?>"
                                    data-product-description="<?php echo $row['product_description']; ?>"
                                    data-product-numbeter="<?php echo $row['number_of_product']; ?>"
                                    data-product-categ="<?php echo $row['product_category']; ?>"
                                    onclick="openForm(this)">
                                Add TO Cart
                            </button>
                        </div>
                    </div>
                    <?php
                }

                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_close($conn);
          ?>


          </div>
        </div>
      </div>
    </section>
    <!-- //////////////////////////////////////////// -->
    <section
      class="u-align-center u-clearfix u-container-align-center u-grey-90 u-section-3"
      id="carousel_013a"
    >
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-1">
          Fresh ​Brownies, Pastries, etc.
        </h2>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-white u-list-item-1"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1"
              >
                <div
                  class="u-image u-image-circle u-image-1"
                  alt=""
                  data-image-width="1277"
                  data-image-height="995"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-2"
                >
                  croissant
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  pastry created from rolling and folding buttery dough over and
                  over into a thin sheet that is then cut and rolled into its
                  iconic shape, as it bakes into a tempting golden brown
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-1" onclick="openForm1('fggggg.jpg','croissant','$2','pastry created from rolling and folding buttery dough over and over into a thin sheet that is then cut and rolled into its iconic shape, as it bakes into a tempting golden brown')"
                  >ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-2"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-2"
              >
                <div
                  class="u-image u-image-circle u-image-2"
                  alt=""
                  data-image-width="1144"
                  data-image-height="902"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-4"
                >
                  Brownies
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  a chocolate backed confection. which comes in a variety of
                  forms and may be either fudgy or cakey.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-2" onclick="openForm1('yyyy.jpg','Brownies','$2','a chocolate backed confection. which comes in a variety of forms and may be either fudgy or cakey.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-3"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-3"
              >
                <div
                  class="u-image u-image-circle u-image-3"
                  alt=""
                  data-image-width="1144"
                  data-image-height="902"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-6"
                >
                  cinnamon bun
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  sweet pastry that is seasoned with cinnamon powder.
                  and​&nbsp;is also well-known worldwide.&nbsp;&nbsp;and it is
                  in the shape of a swirl.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-3" onclick="openForm1('f5f4b03a-6b27-3595-ba4e-7b894cc961a3.jpg','cinnamon bun','$1','sweet pastry that is seasoned with cinnamon powder. and​&nbsp;is also well-known worldwide.&nbsp;&nbsp;and it is in the shape of a swirl.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-4"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-4"
              >
                <div
                  class="u-image u-image-circle u-image-4"
                  alt=""
                  data-image-width="1144"
                  data-image-height="902"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-8"
                >
                  turkish bagels
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  sweeter than a classic New York-style bagel, and the texture
                  is lighter and less doughy, though still crisp on the outside.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-4" onclick="openForm1('444.jpg','turkish bagels','$1','sweeter than a classic New York-style bagel, and the texture is lighter and less doughy, though still crisp on the outside.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-5"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-5"
              >
                <div
                  class="u-image u-image-circle u-image-5"
                  alt=""
                  data-image-width="1144"
                  data-image-height="887"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-10"
                >
                  Doughnuts
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  ring-shaped snack food popular in many countries, which are
                  usually deep fried from flour doughs which either spread with
                  chocolate or icing on top
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-5" onclick="openForm1('c91fa21f-6a02-001e-d59f-2125c9c711bd.jpg','Doughnuts','$1','ring-shaped snack food popular in many countries, which are usually deep fried from flour doughs which either spread with chocolate or icing on top')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-6"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-6"
              >
                <div
                  class="u-image u-image-circle u-image-6"
                  alt=""
                  data-image-width="1144"
                  data-image-height="887"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-12"
                >
                  Tarts
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  a baked dish consisting of a filling over a pastry base with
                  an open top not covered with pastry. the filling may be sweet
                  or savory.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-6"onclick="openForm1('96a8f2c7-47a4-66cb-fec2-68902bf475cf.jpg','Tarts','$1','a baked dish consisting of a filling over a pastry base with an open top not covered with pastry. the filling may be sweet or savory.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-7"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-7"
              >
                <div
                  class="u-image u-image-circle u-image-7"
                  alt=""
                  data-image-width="1144"
                  data-image-height="887"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-14"
                >
                  shortbread
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  a soft buttery crumb that melt in your mouth, similar to short
                  crust pastry.&nbsp;This ratio is also what makes shortbread so
                  crave-worthy.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-7"onclick="openForm1('3ec2a0c1-031e-107f-1950-2cfd3f6314ce.jpg','shortbread','$2','a soft buttery crumb that melt in your mouth, similar to short crust pastry.&nbsp;This ratio is also what makes shortbread so crave-worthy.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-8"
            >
              <div
                class="u-container-layout u-similar-container u-valign-bottom u-container-layout-8"
              >
                <div
                  class="u-image u-image-circle u-image-8"
                  alt=""
                  data-image-width="1144"
                  data-image-height="887"
                ></div>
                <h4
                  class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-16"
                >
                  Cookies
                </h4>
                <p class="u-align-center u-text u-text-default u-text-3">
                  a baked or cooked snack or dessert that is typically small,
                  flat and sweet.&nbsp;​it is soft and chewy on the inside while
                  being slightly crispy on the edges.
                </p>
                <botton
                  href="#"
                  class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-8" onclick="openForm1('444666.jpg','Cookies','$1','a baked or cooked snack or dessert that is typically small, flat and sweet.&nbsp;​it is soft and chewy on the inside while being slightly crispy on the edges.')"
                >
                  ADD TO CART</botton
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ///////////////////////////////////////////////// -->
    <section
      class="u-clearfix u-image u-shading u-section-4"
      id="carousel_0b67"
      data-image-width="1620"
      data-image-height="1080"
    >
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-body-alt-color u-text-1">
          our selections
        </h2>
        <div class="custom-expanded u-align-center u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div
              class="u-align-left u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1"
            >
              <div
                class="u-container-layout u-similar-container u-container-layout-1"
              >
                <h4 class="u-text u-text-2">store products</h4>
                <ul class="u-custom-list u-text u-text-3">
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Dairy Milk
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Snickers
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Raffaello<br />
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Ferrero Rocher<br />
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Pocky<br />
                  </li>
                </ul>
              </div>
            </div>
            <div
              class="u-align-left u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white u-list-item-2"
            >
              <div
                class="u-container-layout u-similar-container u-container-layout-2"
              >
                <h4 class="u-text u-text-4">Fresh goods</h4>
                <ul class="u-custom-list u-text u-text-5">
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Cookies
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Tarts<br />
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Croissant
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Doughnuts<br />
                  </li>
                  <li>
                    <div class="u-list-icon">
                      <div>—</div>
                    </div>
                    Turkish bagels<br />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- ////////////////////////////////////////////////////// -->
    <div class="form-popup" id="myForm">
    <section
      class="u-align-center u-clearfix  u-block-7348-1"
      custom-posts-hash="[]"
      data-style="blank"
      data-section-properties='{"margin":"none","stretch":true}'
      id="carousel_8fb0"
      data-source="functional_fix"
      data-id="7348"
      style="
        background-image: linear-gradient(#e95b19, white);
        
      "
      data-manual-length-set="true"
    >
    <!-- #e95b19 -->
      <img
        class="u-image u-image-contain u-block-control u-align-center u-image-default u-block-7348-13"
        alt=""
        data-image-width="1280"
        data-image-height="1276"
        data-block="28"
        onclick="closeForm()"
        style="
          width: 65.9999px;
          height: 46px;
          position: absolute;
          top: 5px;
          right: 0;
          cursor: pointer; 
        "
        data-block-type="Image"
        src="images/cancel2.png"
      />
      <div
        class="u-align-center-md u-align-center-sm u-align-center-xs u-container-style u-product u-block-controlmc 39u-expanded-width custom-expanded u-block-7348-3"
        style="
          min-height: 597px;
          background-image: none;
          margin-top: 40px;
          margin-bottom: 0px;
          width: 100%;
          height: auto;
        "
        data-block="2"
        data-block-type="Product"
        data-block-parent-selected="true"
      >

        <div
          class="u-container-layout u-block-7348-4"
          style="
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 18.9845px;
            padding-right: 18.9845px;
          "
          data-container-layout-dom="1"
        >
          <img
          id="dynamicImage"
            alt=""
            class="u-image u-image-default u-product-control u-block-control u-image-contain u-opacity u-block-7348-5"
            style="
              width: 353px;
              height: 595.453px;
              margin: 0px auto 0px 0.0012px;
            "
            data-block="3"
            data-block-type="ProductImage"
            data-image-width="481"
            data-image-height="519"
          />
          
          <div
            class=" u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-block-control u-block-7348-7"
            style="
              width: 617px;
              min-height: 596px;
              margin: -594.469px 17.016px 0px auto;
              height: auto;
            "
            data-block="4"
            data-block-type="Group"
          >
            <div
              class="u-container-layout u-valign-middle u-block-7348-8"
              style="
                padding-top: 30px;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 0;
              "
              data-container-layout-dom="2"
            >
              <div
                class="u-product-control u-product-price u-block-control u-block-7348-10"
                style="margin: 0px auto"
                data-block="5"
                data-block-type="ProductPrice"
              >
                <div class="u-price-wrapper u-spacing-10">
                  <!-- <div
                    class="u-hide-price u-old-price"
                    style="text-decoration: line-through !important"
                    wfd-invisible="true"
                  >
                    $12
                  </div> -->
                  <div
                  id="pricedynamic"
                    class="u-price"
                    style="font-size: 3rem; font-weight: 700; color: #ffffff;"
                  >
                    $9
                  </div>
                </div>
                <br>
                <br>
                <div class="u-price-wrapper u-spacing-10">

 
              <!-- <button id="decrementButton" class="marginbuttons" style="font-size: 3rem; font-weight: 500; color: #ffffff;">-</button>
              <br>
              <div id="currentValue" class="marginbuttons" style="font-size: 2rem; font-weight: 500; color: #ffffff; margin-top:15px">1</div>
              <br>
              <button id="incrementButton" class="marginbuttons" style="font-size: 3rem; font-weight: 500; color: #ffffff;">+</button> -->


                  <botton id="decrementButton"
                    class="marginbuttons"
                    style="font-size: 3rem; font-weight: 500; color: #ffffff; cursor: pointer; "
                  > - </botton>
                  <br>
                  <div id="currentValue"
                    class="marginbuttons"
                    style="font-size: 2rem; font-weight: 500; color: #ffffff; margin-top:15px"
                  > 1 </div>
                  <br>
                  <botton id="incrementButton"
                    class="marginbuttons"
                    style="font-size: 3rem; font-weight: 400; color: #ffffff; cursor: pointer; "
                  > + </botton>

                </div>

              </div>
              <h2
                class="u-product-control u-text u-text-default u-block-control u-block-7348-9"
                style="
                  text-transform: uppercase;
                  font-size: 1.25rem;
                  letter-spacing: 4px;
                  margin: 30px auto 0px;
                "
                data-block="6"
                data-block-type="ProductTitle"
              >
                <!-- <a class="u-product-title-link colortxt" style="color: #ffffff;" href="#"><?php echo $name_msg; ?></a> -->
                <a class="u-product-title-link colortxt" style="color: #ffffff;" href="#" id="productnamedynamic">Sample Product</a>
              </h2>
              <h2 class="number_of_product" id="productnumberdynamic">30</h2>
              <h2 class="number_of_product" id="productcatdynamic"> Pastry</h2>
              <div
                class="u-product-control u-product-desc u-text u-block-control u-block-7348-11"
                style="margin: 15px 0px 0px"
                data-block="7"
                data-block-type="ProductDesc"
              >
                <h6 id="textdynamic" class="colortxt" style="color: #ffffff; font-family: system-ui;">
                  Sample text. Lorem ipsum dolor sit amet, consectetur
                  adipiscing elit nullam nunc justo sagittis suscipit ultrices.
                </h6>
              </div>
              <!-- <a
              id="add_to_cart"
                href="#"
                class="u-btn u-button-style u-product-control u-text-hover-white u-block-control u-border-4 u-border-white u-text-white u-block-7348-12"
                style="
                  border-style: solid;
                  font-weight: 700;
                  text-transform: uppercase;
                  margin: 60px auto 0px;
                  padding: 10px 137px 10px 136px;
                "
                data-product-button-click-type="buy-now"
                data-block="8"
                data-block-type="ProductButton"
                
             
                
                >Add to Cart</a
              > -->
              <form id="cartForm" method="post" >
                <!-- Hidden input fields to store dynamic content -->
                <input type="hidden" id="dynamicImageInput" name="dynamicImageInput">
                <input type="hidden" id="productNameInput" name="productNameInput">
                <input type="hidden" id="pricedynamicInput" name="pricedynamicInput">
                <input type="hidden" id="currentValueInput" name="currentValueInput">
                <input type="hidden" id="productcatdynamicInput" name="productcatdynamicInput">

                <!-- Button to add to cart -->
                <button type="submit" name="add_to_cart">Add to Cart</button>
</form>


             
            </div>
          </div>

        </div>
      </div>
    </section>
    </div>

    <?php

include "footer.php";
?>
<script src="scriptss.js"></script>
  </body>
</html>
