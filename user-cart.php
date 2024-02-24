<!-- <?php
// Check if the cookie is set
if(isset($_COOKIE['productInfos'])) {
    // Decode the JSON data from the cookie
    $cookie_data = stripslashes($_COOKIE['productInfos']);
    $productInfo = json_decode($cookie_data, true);

    // Check if all required keys exist
    if (isset($productInfo['Image']) && isset($productInfo['productname']) &&
        isset($productInfo['price']) && isset($productInfo['quantity']) &&
        isset($productInfo['productcat'])) {

        // Access the individual elements of the productInfo array
        $dynamicImage = $productInfo['Image'];
        $productName = $productInfo['productname'];
        $price = $productInfo['price'];
        $quantity = $productInfo['quantity'];
        $productCategory = $productInfo['productcat'];

        // Now you can use these variables as needed
        echo "Dynamic Image: $dynamicImage<br>";
        echo "Product Name: $productName<br>";
        echo "Price: $price<br>";
        echo "Quantity: $quantity<br>";
        echo "Product Category: $productCategory<br>";
    } else {
        echo "Some key is missing in the cookie data.";
    }
} else {
    echo "Cookie 'productInfos' not set!";
}
var_dump($_COOKIE);
?> -->

<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      
    </script>
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
    <link rel="stylesheet" href="testcart.css" media="screen" />
    
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="Our-Product.css" media="screen" />
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
    <style>
      .btn-outline-primary {
        color: #e95b19;
        border-color: #e95b19;
      }
      .btn-outline-primary:hover {
        color: #e95b19;
        border-color: #e95b19;
      }
      .marginll {
        margin-left: 20px;
      }
      .form-control:focus {
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #007bff;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e95b19;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }
    </style>

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
    <meta name="theme-color" content="#478ac9" />
    <meta name="twitter:site" content="@" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Our Product" />
    <meta name="twitter:description" content="" />
    <meta property="og:title" content="Our Product" />
    <meta property="og:type" content="website" />
    <meta data-intl-tel-input-cdn-path="intlTelInput/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body data-path-to-root="./"
    data-include-products="false"
    class="u-body u-xl-mode"
    data-lang="en">


    <div class="container-fluid my-5">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="card shadow-lg">
            <div class="row justify-content-around">
              <div class="col-md-5">
                <div class="card border-0">
                  <div class="card-header card-2">
                    <h2 class="card-title space">Checkout</h2>
                    <p class="card-text text-muted mt-4 space">
                      SHIPPING DETAILS
                    </p>
                    <hr class="my-0" />
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">
                      <div class="col">
                        <p class="text-muted mb-2">PAYMENT DETAILS</p>
                        <hr class="mt-0" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="NAME" class="small text-muted mb-1"
                        >NAME ON CARD</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        name="NAME"
                        id="NAME"
                        aria-describedby="helpId"
                        placeholder="Name"
                      />
                    </div>
                    <div class="form-group">
                      <label for="NAME" class="small text-muted mb-1"
                        >CARD NUMBER</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        name="NAME"
                        id="NAME"
                        aria-describedby="helpId"
                        placeholder="4534 xxxx xxxx xxxx"
                      />
                    </div>
                    <div class="row no-gutters">
                      <div class="col-sm-6 pr-sm-2">
                        <div class="form-group">
                          <label for="NAME" class="small text-muted mb-1"
                            >VALID THROUGH</label
                          >
                          <input
                            type="text"
                            class="form-control form-control-sm"
                            name="NAME"
                            id="NAME"
                            aria-describedby="helpId"
                            placeholder="06/21"
                          />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="NAME" class="small text-muted mb-1"
                            >CVC CODE</label
                          >
                          <input
                            type="text"
                            class="form-control form-control-sm"
                            name="NAME"
                            id="NAME"
                            aria-describedby="helpId"
                            placeholder="183"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row mb-5 mt-4">
                      <div class="col-md-7 col-lg-6 mx-auto">
                        <button
                          type="button"
                          class="btn btn-block btn-outline-primary btn-lg"
                        >
                          PURCHASE $37
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card border-0">
                  <div class="card-header card-2">
                    <p class="card-text text-muted mt-md-4 mb-2 space">
                      YOUR ORDER
                      <span class="small text-muted ml-2 cursor-pointer"
                        >EDIT SHOPPING BAG</span
                      >
                    </p>
                    <hr class="my-2" />
                  </div>
                  <div class="card-body pt-0">
                    <div class="row justify-content-between">
                      <div class="col-auto col-md-7">
                        <div class="media flex-column flex-sm-row">
                          <img
                            class="img-fluid"
                            src="images/dairymilk.jpg"
                            width="62"
                            height="62"
                          />
                          <div class="media-body my-auto marginll">
                            <div class="row">
                              <div class="col-auto">
                                <p class="mb-0"><b>EC-GO Bag Standard</b></p>
                                <small class="text-muted"
                                  >1 Week Subscription</small
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p class="boxed-1">2</p>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p><b>179 USD</b></p>
                      </div>
                    </div>
                    <hr class="my-2" />
                    <div class="row justify-content-between">
                      <div class="col-auto col-md-7">
                        <div class="media flex-column flex-sm-row">
                          <img
                            class="img-fluid"
                            src="images/snickers2.jpg"
                            width="62"
                            height="62"
                          />
                          <div class="media-body my-auto marginll">
                            <div class="row">
                              <div class="col">
                                <p class="mb-0"><b>EC-GO Bag Standard</b></p>
                                <small class="text-muted"
                                  >2 Week Subscription</small
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p class="boxed">3</p>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p><b>179 USD</b></p>
                      </div>
                    </div>
                    <hr class="my-2" />
                    <div class="row justify-content-between">
                      <div class="col-auto col-md-7">
                        <div class="media flex-column flex-sm-row">
                          <img
                            class="img-fluid"
                            src="images/raffaello.jpg"
                            width="62"
                            height="62"
                          />
                          <div class="media-body my-auto marginll">
                            <div class="row">
                              <div class="col">
                                <p class="mb-0"><b>EC-GO Bag Standard</b></p>
                                <small class="text-muted"
                                  >2 Week Subscription</small
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p class="boxed-1">2</p>
                      </div>
                      <div class="pl-0 flex-sm-col col-auto my-auto">
                        <p><b>179 USD</b></p>
                      </div>
                    </div>
                    <hr class="my-2" />
                    <div class="row">
                      <div class="col">
                        <div class="row justify-content-between">
                          <div class="col-4">
                            <p class="mb-1"><b>Subtotal</b></p>
                          </div>
                          <div class="flex-sm-col col-auto">
                            <p class="mb-1"><b>179 USD</b></p>
                          </div>
                        </div>
                        <div class="row justify-content-between">
                          <div class="col">
                            <p class="mb-1"><b>Shipping</b></p>
                          </div>
                          <div class="flex-sm-col col-auto">
                            <p class="mb-1"><b>0 USD</b></p>
                          </div>
                        </div>
                        <div class="row justify-content-between">
                          <div class="col-4">
                            <p><b>Total</b></p>
                          </div>
                          <div class="flex-sm-col col-auto">
                            <p class="mb-1"><b>537 USD</b></p>
                          </div>
                        </div>
                        <hr class="my-0" />
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
