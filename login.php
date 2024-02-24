

<?php 
// $error_msg = "Invalid credential!";
session_start(); 
session_destroy (); 
session_start(); 

include "DB_connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {
      $info_msg = "User Name is required";
        // header("Location: login.php?error=User Name is required");

        // exit();

    }else if(empty($pass)){

      $info_msg = "Password is required";
        // header("Location: login.php?error=Password is required");

        // exit();

    }else{

        $sql = "SELECT * FROM users_tbl WHERE username='$uname'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['password'] === $pass) {

              if(isset($_POST['remember']) && 
                $_POST['remember'] == 'On') 
              {
                $info_msg = "you have loged in";
                $_SESSION['usename'] = $row['username'];

                $_SESSION['user'] = $row['user'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['phone'] = $row['phone'];

                $_SESSION['email'] = $row['email'];
                header("Location: Home.php");
                // $info_msg = "save access.";
                //   echo "save access.";
              }
              else
              {
                header("Location: Home.php");
                $_SESSION['usename'] = $row['username'];

                $_SESSION['user'] = $row['user'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['phone'] = $row['phone'];

                $_SESSION['email'] = $row['email'];
                $info_msg = "you have loged in";
                // $info_msg = "Do not save access.";
                //   echo "Do not save access.";
              }	


                // header("Location: home.php");

                // exit();

            }
            else{
              $error_msg = "Incorect credential!";

            }

        }else{
          $info_msg = "User not registered";

        }

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
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="page_type" content="np-template-header-footer-from-plugin" />
    <title>Page 6</title>
    <link
      rel="stylesheet"
      href="nicepage.css?version=b5b4ac9d-9308-4649-a92d-1588bbc52f0c"
      media="screen"
    />
    <link
      href="./assets/css/theme.min.css"
      type="text/css"
      rel="stylesheet"
      id="style-default"
    />

    <meta name="generator" content="Nicepage 4.5.4, nicepage.com" />

    <style class="u-style">
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
      .u-section-2 {
        min-height: 100vh;
        background-image: url("images/b1182e8f-cee4-f571-00ff-b553b7f96898.jpg");
        background-position: 50% 0%;
      }
      .form-label-lg-in {
  margin-bottom: 0.5rem;
  font-size: 0.74rem;
}
      .u-section-2 .u-sheet-1 {
        min-height: 100vh;
      }
      .u-section-2 .u-group-1 {
        width: 566px;
        min-height: 64px;
        background-image: none;
        margin: 60px auto 27px;
      }
      .u-section-2 .u-container-layout-1 {
        padding: 0 20px;
      }
      .withline {
        width: 60px;
        text-align: center;
        position: absolute;
        /* right: 50%; */
            top: 1%;
        left: 44%;
        /* transform: translate(-50%, -50%); */
      }
      .u-section-2 .u-icon-1 {
        width: 108px;
        height: 108px;
        background-image: none;
        margin: -34px auto 0;
      }
      .u-section-2 .u-text-1 {
        font-weight: 700;
        font-size: 1.875rem;
        margin: 30px auto 0;
      }
      .u-section-2 .u-form-1 {
        height: 351px;
        background-image: none;
        width: 442px;
        margin: 18px auto 0;
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
        width: 100%;
        padding: 10px 31px 10px 29px;
      }
      .u-section-2 .u-btn-2 {
        align-self: center;
        border-style: none;
        margin: 0px auto 0;
        padding: 0;
      }
      .u-section-2 .u-btn-3 {
        border-style: none;
        margin: 0px auto 30px auto;
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
          min-height: 698px;
        }
        .u-section-2 .u-group-1 {
          margin-bottom: 60px;
        }
      }
      @media (max-width: 991px) {
        .u-section-2 .u-sheet-1 {
          min-height: 535px;
        }
      }
      @media (max-width: 767px) {
        .u-section-2 .u-sheet-1 {
          min-height: 401px;
        }
        .u-section-2 .u-group-1 {
          width: 540px;
        }
        .u-section-2 .u-container-layout-1 {
          padding-left: 10px;
          padding-right: 10px;
        }
      }
      @media (max-width: 575px) {
        .u-section-2 .u-sheet-1 {
          min-height: 252px;
        }
        .u-section-2 .u-group-1 {
          width: 340px;
        }
        .u-section-2 .u-text-1 {
          font-size: 1.5rem;
        }
        .u-section-2 .u-form-1 {
          width: 320px;
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
    </style>
    <style class="u-style">
      .u-cookies-consent {
        background-image: none;
      }
      .u-cookies-consent .u-sheet-1 {
        min-height: 212px;
      }
      .u-cookies-consent .u-layout-wrap-1 {
        margin-top: 30px;
        margin-bottom: 30px;
      }
      .u-cookies-consent .u-layout-cell-1 {
        min-height: 152px;
      }
      .u-cookies-consent .u-container-layout-1 {
        padding: 30px 60px;
      }
      .u-cookies-consent .u-text-1 {
        margin-top: 0;
        margin-right: 20px;
        margin-bottom: 0;
      }
      .u-cookies-consent .u-text-2 {
        margin: 8px 20px 0 0;
      }
      .u-cookies-consent .u-layout-cell-2 {
        min-height: 152px;
      }
      .u-cookies-consent .u-container-layout-2 {
        padding: 30px;
      }
      .u-cookies-consent .u-btn-1 {
        margin: 0 auto 0 0;
      }
      @media (max-width: 1199px) {
        .u-cookies-consent .u-sheet-1 {
          min-height: 131px;
        }
        .u-cookies-consent .u-layout-cell-1 {
          min-height: 125px;
        }
        .u-cookies-consent .u-text-1 {
          margin-right: 0;
        }
        .u-cookies-consent .u-text-2 {
          margin-right: 0;
        }
        .u-cookies-consent .u-layout-cell-2 {
          min-height: 125px;
        }
      }
      @media (max-width: 991px) {
        .u-cookies-consent .u-sheet-1 {
          min-height: 106px;
        }
        .u-cookies-consent .u-layout-cell-1 {
          min-height: 100px;
        }
        .u-cookies-consent .u-container-layout-1 {
          padding-left: 30px;
          padding-right: 30px;
        }
        .u-cookies-consent .u-layout-cell-2 {
          min-height: 100px;
        }
      }
      @media (max-width: 767px) {
        .u-cookies-consent .u-sheet-1 {
          min-height: 225px;
        }
        .u-cookies-consent .u-layout-cell-1 {
          min-height: 154px;
        }
        .u-cookies-consent .u-container-layout-1 {
          padding-left: 10px;
          padding-right: 10px;
          padding-bottom: 20px;
        }
        .u-cookies-consent .u-layout-cell-2 {
          min-height: 65px;
        }
        .u-cookies-consent .u-container-layout-2 {
          padding: 10px;
        }
      }
      @media (max-width: 575px) {
        .u-cookies-consent .u-sheet-1 {
          min-height: 121px;
        }
        .u-cookies-consent .u-layout-cell-1 {
          min-height: 100px;
        }
        .u-cookies-consent .u-layout-cell-2 {
          min-height: 15px;
        }
      }
    </style>

    <meta name="theme-color" content="#8945e8" />
    <meta property="og:title" content="Page 6" />
    <meta property="og:type" content="website" />
    <link
      rel="canonical"
      href="https://website1442374.nicepage.io/Page-6.html"
    />
  </head>
  <body class="u-body u-xl-mode">
    <section
      class="u-align-center u-clearfix u-image u-section-2"
      id="sec-07dc"
      data-image-width="1527"
      data-image-height="1080"
    >
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div
          class="u-align-center u-container-style u-group u-radius-50 u-shape-round u-white u-group-1"
        >
          <div class="u-container-layout u-container-layout-1">
            <span
              class="u-icon u-icon-circle u-palette-2-base u-spacing-22 u-text-white u-icon-1"
              ><svg
                class="u-svg-link"
                preserveAspectRatio="xMidYMin slice"
                viewBox="0 0 60 60"
                style=""
              >
                <use xlink:href="#svg-c2f1"></use></svg
              ><svg
                class="u-svg-content"
                viewBox="0 0 60 60"
                x="0px"
                y="0px"
                id="svg-c2f1"
                style="enable-background: new 0 0 60 60"
              >
                <path
                  d="M48.014,42.889l-9.553-4.776C37.56,37.662,37,36.756,37,35.748v-3.381c0.229-0.28,0.47-0.599,0.719-0.951
	c1.239-1.75,2.232-3.698,2.954-5.799C42.084,24.97,43,23.575,43,22v-4c0-0.963-0.36-1.896-1-2.625v-5.319
	c0.056-0.55,0.276-3.824-2.092-6.525C37.854,1.188,34.521,0,30,0s-7.854,1.188-9.908,3.53C17.724,6.231,17.944,9.506,18,10.056
	v5.319c-0.64,0.729-1,1.662-1,2.625v4c0,1.217,0.553,2.352,1.497,3.109c0.916,3.627,2.833,6.36,3.503,7.237v3.309
	c0,0.968-0.528,1.856-1.377,2.32l-8.921,4.866C8.801,44.424,7,47.458,7,50.762V54c0,4.746,15.045,6,23,6s23-1.254,23-6v-3.043
	C53,47.519,51.089,44.427,48.014,42.889z M51,54c0,1.357-7.412,4-21,4S9,55.357,9,54v-3.238c0-2.571,1.402-4.934,3.659-6.164
	l8.921-4.866C23.073,38.917,24,37.354,24,35.655v-4.019l-0.233-0.278c-0.024-0.029-2.475-2.994-3.41-7.065l-0.091-0.396l-0.341-0.22
	C19.346,23.303,19,22.676,19,22v-4c0-0.561,0.238-1.084,0.67-1.475L20,16.228V10l-0.009-0.131c-0.003-0.027-0.343-2.799,1.605-5.021
	C23.253,2.958,26.081,2,30,2c3.905,0,6.727,0.951,8.386,2.828c1.947,2.201,1.625,5.017,1.623,5.041L40,16.228l0.33,0.298
	C40.762,16.916,41,17.439,41,18v4c0,0.873-0.572,1.637-1.422,1.899l-0.498,0.153l-0.16,0.495c-0.669,2.081-1.622,4.003-2.834,5.713
	c-0.297,0.421-0.586,0.794-0.837,1.079L35,31.623v4.125c0,1.77,0.983,3.361,2.566,4.153l9.553,4.776
	C49.513,45.874,51,48.28,51,50.957V54z"
                ></path></svg
            ></span>
            <h3
              class="u-custom-font u-font-montserrat u-text u-text-default u-text-1"
            >
              Login
            </h3>
            <div
              class="u-border-3 u-border-palette-2-base u-line u-line-horizontal u-line-1 withline"
            ></div>
            <div class="u-form u-login-control u-white u-form-1">
              <?php if(!empty($error_msg)){ ?>
              <div class="alert-danger"><?php echo $error_msg; ?></div>
              <?php } ?>

              <?php if(!empty($info_msg)){ ?>
              <div class="alert-info"><?php echo $info_msg; ?></div>
              <?php } ?>
              <form
                action=""
                method="post"
                class="u-clearfix u-form-custom-backend u-form-spacing-20 u-form-vertical u-inner-form"
                source="custom"
                name="form"
                style="padding: 30px"
              >
    

                <div class="u-form-group u-form-name">
                  <label for="username-a30d" class="form-label">Username</label>
                  <input
                    type="text"
                    placeholder="Enter your Username"
                    id="username-a30d"
                    name="uname"
                    class="form-control form-icon-input"
                    required=""
                  />
                </div>
                <div class="u-form-group u-form-password">
                  <label for="password-a30d" class="form-label">Password </label>
                  <input
                    type="password"
                    placeholder="Enter your Password"
                    id="password-a30d"
                    name="password"
                    class="form-control form-icon-input"
                    required=""
                  />
                </div>
                <div class="u-form-checkbox u-form-group">
                  <input
                    type="checkbox"
                    id="checkbox-a30d"
                    name="remember"
                    value="On"
                  />
                  <label for="checkbox-a30d" class="form-label">Remember me</label>
                </div>

                <div class="u-align-right u-form-group u-form-submit">
                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                  <!-- <a
                    href="#"
                    class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-base u-btn-1"
                    >Login</a
                  >
                  <input
                    type="submit"
                    value="submit"
                    class="u-form-control-hidden"
                  /> -->
                </div>
              </form>
            </div>
            <a
              href=""
              class="form-label-lg-in form-label u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-active-palette-2-base u-text-grey-40 u-text-hover-palette-2-base u-btn-2"
              >Forgot password?</a
            >
            <a
              href="signup.php"
              class="form-label-lg-in form-label u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-login-control u-login-create-account u-none u-text-active-palette-2-base u-text-grey-40 u-text-hover-palette-2-base u-btn-3"
              >Don't have an account?</a
            >
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
