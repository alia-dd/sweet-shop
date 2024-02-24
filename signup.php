
<?php 


// $error_msg = "Invalid credential!";
session_start(); 

include "DB_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['confirm-password']) && isset($_POST['phone']) && isset($_POST['email'])){
      function validate($data){

        $data = trim($data);
    
        $data = stripslashes($data);
    
        $data = htmlspecialchars($data);
    
        return $data;
    
        }
        $uname = validate($_POST['username']);
        $name = validate($_POST['name']);
        $phone = validate($_POST['phone']);
        $email = validate($_POST['email']);
        $pass = validate($_POST['password']);
        $confirm = validate($_POST['confirm-password']);


        if($pass == $confirm){
            $sql = "SELECT * FROM users_tbl WHERE username='$uname' or email='$email' ";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $error_msg = "User already exists!";
            }
            else{
                $sql = "INSERT INTO users_tbl(name, password, email, phone,username) VALUES(' $name','$pass', '$email', '$phone', '$uname')";
                        if($conn->query($sql)){
                            // Redirect to login page
                            header("Location: login.php");
                            $info_msg = "User saved";
                            $_POST['username']="";
                            $_POST['name']="";
                            $_POST['phone']="";
                            $_POST['email']="";
                            $_POST['password']="";
                            $_POST['confirm-password']="";
                        }
            }
            
            
        }
        else{
            $error_msg = "Passwords didn't match!";
        }
    }
    else{
        $info_msg = "unknown";
    
      }
    
}
else{

}
?>



<!DOCTYPE html>
<html style="font-size: 16px">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta name="keywords" content="Login" />
    <meta name="description" content="" />
    <meta name="page_type" content="np-template-header-footer-from-plugin" />
    <title>Home</title>
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

    <meta name="generator" content="Nicepage 4.5.5, nicepage.com" />

    <style class="u-style">
      /* .u-body {
        color: #ffffff;
        background-color: #ffffff;
      } */
            .btn-primary, .tox .tox-dialog__footer .tox-button:last-child, .tox .tox-button {
            --phoenix-btn-color: #fff;
            --phoenix-btn-bg: #e95b19;
            --phoenix-btn-border-color: transparent;
            --phoenix-btn-hover-color: #fff;
            --phoenix-btn-hover-bg: #e95b19;
            --phoenix-btn-hover-border-color: rgba(0, 0, 0, 0.2);
            --phoenix-btn-focus-shadow-rgb: 255, 255, 255;
            --phoenix-btn-active-color: #fff;
            --phoenix-btn-active-bg: #e95b19;
            --phoenix-btn-active-border-color: rgba(0, 0, 0, 0.25);
            --phoenix-btn-active-shadow: initial;
            --phoenix-btn-disabled-color: #fff;
            --phoenix-btn-disabled-bg: #e95b19;
            --phoenix-btn-disabled-border-color: transparent;
        }
            .logtext {
                color: #f34242;
                font-size: small;
                font-style: oblique;
            }
            .form-label-lg-in {
        margin-bottom: 0.5rem;
        font-size: 0.74rem;
        position: relative;
        left:30%;
        }
      .u-section-2 {
        background-image: none;
      }
      .u-section-2 .u-sheet-1 {
        min-height: 777px;
      }
      .u-section-2 .u-layout-wrap-1 {
        margin-top: 60px;
        margin-bottom: 0;
      }
      .u-section-2 .u-image-1 {
        min-height: 100vh;
        background-image: url("images/b1182e8f-cee4-f571-00ff-b553b7f96898.jpg");
        background-position: 50% 50%;
      }
      .u-section-2 .u-container-layout-1 {
        padding: 0;
      }
      .u-section-2 .u-layout-cell-2 {
        min-height: 599px;
      }
      .u-section-2 .u-container-layout-2 {
        padding: 20px 90px;
      }
      .u-section-2 .u-text-1 {
        font-weight: 700;
        font-size: 2.25rem;
        margin: 0 auto 0 0;
      }
      .u-section-2 .u-line-1 {
        width: 91px;
        height: 3px;
        transform-origin: left center;
        margin: 10px auto 0 0;
      }
      .u-section-2 .u-form-1 {
        height: 300px;
        width: 490px;
        margin: 35px 0 0;
      }
      .u-section-2 .u-input-1 {
        background-image: none;
      }
      .u-section-2 .u-input-2 {
        background-image: none;
      }
      .u-section-2 .u-btn-1 {
        background-image: none;
        border-style: none;
        text-transform: uppercase;
        width: 100%;
        padding: 14px 30px 15px;
      }
      .u-section-2 .u-btn-2 {
        border-style: none;
        font-size: 1.125rem;
        margin: 0px auto 0 0;
        padding: 0;
      }
      .u-section-2 .u-btn-3 {
        border-style: none;
        align-self: center;
        font-size: 1.125rem;
        margin: 22px auto 0 0;
        padding: 0;
      }
      .u-section-2 .u-text-2 {
        margin: 33px auto 60px;
      }
      .u-section-2 .u-btn-4 {
        border-style: none none solid;
        padding: 0;
      }
      @media (min-width: 992px){
        section {
        padding-top: 0px;
        padding-bottom: 0px;
        }
      }
    
      @media (max-width: 1199px) {
        .u-section-2 .u-sheet-1 {
          min-height: 672px;
        }
        .u-section-2 .u-image-1 {
          min-height: 494px;
        }
        .u-section-2 .u-layout-cell-2 {
          min-height: 494px;
        }
        .u-section-2 .u-line-1 {
          width: 91px;
        }
        .u-section-2 .u-form-1 {
          width: 390px;
        }
      }
      @media (max-width: 991px) {
        .u-section-2 .u-sheet-1 {
          min-height: 556px;
        }
        .u-section-2 .u-image-1 {
          min-height: 662px;
        }
        .u-section-2 .u-container-layout-1 {
          padding: 0;
        }
        .u-section-2 .u-layout-cell-2 {
          min-height: 557px;
        }
        .u-section-2 .u-form-1 {
          margin-right: initial;
          margin-left: initial;
          width: auto;
        }
      }
      @media (max-width: 767px) {
        .u-section-2 .u-sheet-1 {
          min-height: 845px;
        }
        .u-section-2 .u-image-1 {
          min-height: 548px;
        }
        .u-section-2 .u-layout-cell-2 {
          min-height: 100px;
        }
        .u-section-2 .u-container-layout-2 {
          padding-left: 30px;
          padding-right: 30px;
        }
      }
      @media (max-width: 575px) {
        .u-section-2 .u-sheet-1 {
          min-height: 635px;
        }
        .u-section-2 .u-image-1 {
          min-height: 345px;
        }
        .u-section-2 .u-layout-cell-2 {
          min-height: 557px;
        }
        .u-section-2 .u-line-1 {
          margin-top: 14px;
        }
        .u-section-2 .u-form-1 {
          margin-top: 31px;
          width: auto;
          margin-right: initial;
          margin-left: initial;
        }
      }

      .form-control:focus {
        --phoenix-emphasis-bg: #fff;
                --phoenix-body-color: #31374a;
        color: var(--phoenix-body-color);
        background-color: var(--phoenix-emphasis-bg);
        border-color: #d45114;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0),
            inset 0 0 0 30px var(--phoenix-emphasis-bg), 0 0 0 0.25rem rgba(212, 81, 20,0.25);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0),
            inset 0 0 0 30px var(--phoenix-emphasis-bg), 0 0 0 0.25rem rgba(212, 81, 20,0.25);
        }

      .alert-info {
      --phoenix-alert-color: #fff;
      --phoenix-alert-bg: #e95b19;
      --phoenix-alert-border-color: #e95b19;
      --phoenix-alert-link-color: #0097eb;
      --phoenix-alert-padding-x: 1.5rem;
      --phoenix-alert-padding-y: 1.5rem;
      --phoenix-alert-margin-bottom: 1rem;
      --phoenix-alert-border: 1px solid var(--phoenix-alert-border-color);
      --phoenix-alert-border-radius: 0.5rem;
      position: relative;
      padding: var(--phoenix-alert-padding-y) var(--phoenix-alert-padding-x);
      margin-bottom: var(--phoenix-alert-margin-bottom);
      color: var(--phoenix-alert-color);
      background-color: var(--phoenix-alert-bg);
      border: var(--phoenix-alert-border);
      border-radius: var(--phoenix-alert-border-radius);
      }
      .alert-danger {
        --phoenix-alert-color: #fff;
        --phoenix-alert-bg: #ec1f00;
        --phoenix-alert-border-color: #ec1f00;
        --phoenix-alert-link-color: #b81800;
        --phoenix-alert-padding-x: 1.5rem;
        --phoenix-alert-padding-y: 1.5rem;
        --phoenix-alert-margin-bottom: 1rem;
        --phoenix-alert-border: 1px solid var(--phoenix-alert-border-color);
        --phoenix-alert-border-radius: 0.5rem;
        position: relative;
        padding: var(--phoenix-alert-padding-y) var(--phoenix-alert-padding-x);
        margin-bottom: var(--phoenix-alert-margin-bottom);
        color: var(--phoenix-alert-color);
        background-color: var(--phoenix-alert-bg);
        border: var(--phoenix-alert-border);
        border-radius: var(--phoenix-alert-border-radius);
      }
        /* .alert {
          --phoenix-alert-bg: transparent;
          --phoenix-alert-padding-x: 1.5rem;
          --phoenix-alert-padding-y: 1.5rem;
          --phoenix-alert-margin-bottom: 1rem;
          --phoenix-alert-color: inherit;
          --phoenix-alert-border-color: transparent;
          --phoenix-alert-border: 1px solid var(--phoenix-alert-border-color);
          --phoenix-alert-border-radius: 0.5rem;
          --phoenix-alert-link-color: inherit;
          position: relative;
          padding: var(--phoenix-alert-padding-y) var(--phoenix-alert-padding-x);
          margin-bottom: var(--phoenix-alert-margin-bottom);
          color: var(--phoenix-alert-color);
          background-color: var(--phoenix-alert-bg);
          border: var(--phoenix-alert-border);
          border-radius: var(--phoenix-alert-border-radius);
        } */

    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission behavior

                // Your form handling code here

                return false; // Optionally, you can use "return false" instead of "event.preventDefault()" to prevent form submission
            });
        });
    </script> -->

    <meta name="theme-color" content="#478ac9" />
    <meta property="og:title" content="Home" />
    <meta property="og:type" content="website" />
    <link rel="canonical" href="/" />
  </head>
  <body class="u-body u-xl-mode">
    <section class="u-align-center u-clearfix u-section-2">
      <div class="">
        <div class="">
          <div class="">
            <div class="u-layout-row">
              <div
                class="u-align-center u-container-style u-image u-layout-cell u-shape-rectangle u-size-30-lg u-size-30-xl u-size-60-md u-size-60-sm u-size-60-xs u-image-1"
                data-image-width="1080"
                data-image-height="1080"
              >
                <div
                  class="u-container-layout u-valign-middle u-container-layout-1"
                  src=""
                ></div>
              </div>
              <div
                class="u-align-left u-container-style u-layout-cell u-size-30-lg u-size-30-xl u-size-60-md u-size-60-sm u-size-60-xs u-white u-layout-cell-2"
              >
                <div
                  class="u-container-layout u-valign-middle u-container-layout-2"
                >
                  <h2 class="u-text u-text-default u-text-1">Sign up</h2>
                  <div
                    class="u-border-3 u-border-palette-2-base u-line u-line-horizontal u-line-1"
                  ></div>
                  <div
                    class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-login-control u-form-1"
                  >
                  <?php if(!empty($error_msg)){ ?>
              <div class="alert-danger"><?php echo $error_msg; ?></div>
              <?php } ?>

              <?php if(!empty($info_msg)){ ?>
              <div class="alert-info"><?php echo $info_msg; ?></div>
              <?php } ?>
                    <form
                      action=""
                      method="POST"
                      class="u-clearfix u-form-custom-backend u-form-spacing-20 u-form-vertical u-inner-form"
                      source="custom"
                      name="form"
                      role="form"
                      style="padding: 0px"
                    >
                      <div class="u-form-group u-form-name">
                        <label for="name" class="form-label">Name</label>
                        <input
                          type="text"
                          placeholder="Enter your Name"
                          id="name"
                          name="name"
                          class="form-control form-icon-input"
                          required=""
                        />
                      </div>
                      <div class="u-form-group u-form-name">
                        <label for="phone" class="form-label">Phone</label>
                        <input
                          type="text"
                          placeholder="Enter your Phone"
                          id="phone"
                          name="phone"
                          class="form-control form-icon-input"
                          required=""
                        />
                      </div>

                      <div class="u-form-group u-form-name">
                        <label for="email" class="form-label">Email</label>
                        <input
                          type="text"
                          placeholder="Enter your Email"
                          id="email"
                          name="email"
                          class="form-control form-icon-input"
                          required=""
                        />
                      </div>
                      <div class="u-form-group u-form-name">
                        <label for="username" class="form-label"
                          >Username</label
                        >
                        <input
                          type="text"
                          placeholder="Enter your Username"
                          id="username"
                          name="username"
                          class="form-control form-icon-input"
                          required=""
                        />
                      </div>
                      <div class="row g-3 mb-3 u-form-group u-form-password">
                          <div class="col-xl-6">
                            <label class="form-label" for="password">Password</label><input class="form-control form-icon-input" id="password" type="password" placeholder="Enter your Password" name="password">
                          </div>
                          <div class="col-xl-6">
                            <label class="form-label" for="confirmPassword">Confirm Password</label><input class="form-control form-icon-input" id="confirmPassword" type="password" placeholder="Confirm Password" name="confirm-password">
                          </div>
                        </div>
                      <!-- <div class="u-form-group u-form-password">
                        <label for="password-a30d" class="form-label"
                          >Password</label
                        >
                        <input
                          type="text"
                          placeholder="Enter your Password"
                          id="password-a30d"
                          name="password"
                          class="form-control form-icon-input"
                          required=""
                        />
                      </div> -->

                      <div class="u-align-left u-form-group u-form-submit">
                      <button type="submit" class="btn btn-primary w-100 mb-3">Sign up</button>
                      </div>
                      <input type="hidden" value="" name="recaptchaResponse" />
                    </form>
                  </div>
                  <a
                    href="login.php"
                    class="form-label-lg-in u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-login-control u-login-create-account u-none u-text-active-palette-2-base u-text-grey-40 u-text-hover-palette-2-base u-btn-3"
                    >Already have an account?</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
