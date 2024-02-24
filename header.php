<?php
session_start();

if (!function_exists('fullnav')) {
  function fullnav($user,$name) {
    echo "<script>";
    echo "window.onload = function() {"; // Execute the function after the page is fully loaded
    echo "  if ('$user' === 'user') {";
    echo "    document.getElementById('admin-nav').style.display = 'none';";
    echo "    document.getElementById('admin-nav2').style.display = 'none';";
    echo "    document.getElementById('username').innerText = '$name';";
    echo "  }";
    echo "  if ('$user' === 'admin') {";
    echo "    document.getElementById('username').innerText = '$name';";
    echo "    document.getElementById('username').style.color = '#e95b19';";
    echo "  }";
    echo "}";
    echo "</script>";
  }
}

if (isset($_SESSION['user'])&&isset($_SESSION['user'])) {
    $name = $_SESSION['name'];
    $user = $_SESSION['user'];
    fullnav($user,$name);
    // echo "Logged in as: $user";
} else if(!isset($_SESSION['user'])) {
    // header("Location: login.php");
    // exit(); // Terminate script execution after redirect
}
?>

<header class="u-clearfix u-header u-header" id="sec-f27d">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav
        class="u-menu u-offcanvas u-block-control u-menu-dropdown u-block-bc8d-11"
      data-responsive-from="MD"
      style="
        margin-top: 1px;
        margin-right: 0.2033px;
        margin-bottom: 0px;
        margin-left: auto;
      "
      data-block="1"
      data-block-type="Menu"
        >
          <div
            class="menu-collapse"
            style="font-size: 1rem; letter-spacing: 0px; font-weight: 700"
          >
            <a
              class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-palette-5-base"
              href="#"
            >
              <svg class="u-svg-link" viewBox="0 0 24 24">
                <use xlink:href="#menu-hamburger"></use>
              </svg>
              <svg
                class="u-svg-content"
                version="1.1"
                id="menu-hamburger"
                viewBox="0 0 16 16"
                x="0px"
                y="0px"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g>
                  <rect y="1" width="16" height="2"></rect>
                  <rect y="7" width="16" height="2"></rect>
                  <rect y="13" width="16" height="2"></rect>
                </g>
              </svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
              <li class="u-nav-item">
                <a
                  class="u-border-active-palette-3-base u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-5-base u-text-grey-90 u-text-hover-palette-5-base"
                  href="Home.php"
                  style="padding: 10px"
                  >home</a
                >
              </li>
              <li class="u-nav-item">
                <a
                  class="u-border-active-palette-3-base u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-5-base u-text-grey-90 u-text-hover-palette-5-base"
                  href="Our-Product.php"
                  style="padding: 10px"
                  >Our Products</a
                >
              </li>
              <li class="u-nav-item">
                <a
                  class="u-border-active-palette-3-base u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-5-base u-text-grey-90 u-text-hover-palette-5-base"
                  href="contact.php"
                  style="padding: 10px"
                  >Contact Us</a
                >
              </li>
              <li id = "admin-nav" class="u-nav-item">
                <a
                  class="u-border-active-palette-3-base u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-5-base u-text-grey-90 u-text-hover-palette-5-base"
                  style="padding: 10px"
                  >Admin</a
                >
                <div
                  class="u-nav-popup u-block-control u-block-bc8d-19"
                  data-block="66"
                  data-block-type="Menu"
                >
                  <ul
                    class="u-nav u-unstyled u-h-spacing-20 u-v-spacing-10 u-block-control u-block-bc8d-20"
                    data-block="67"
                    data-block-type="Menu,SubMenu"
                  >
                    <li class="u-nav-item">
                      <a
                        class="u-nav-link u-button-style u-white"
                        href="ProductList.php"
                        data-page-id="6139112"
                        >Products</a
                      >
                    </li>
                    <li class="u-nav-item">
                      <a
                        class="u-nav-link u-button-style u-white"
                        href="User-List.php"
                        data-page-id="6139122"
                        >Users</a
                      >
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="u-nav-item">
                <a
                  class="u-border-active-palette-3-base u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-5-base u-text-grey-90 u-text-hover-palette-5-base"
                  href="login.php"
                  style="padding: 10px"
                    <?php
                      if (isset($_SESSION['user'])) {
                        echo 'ehelll';
                        // session_destroy (); 
                      }
                    ?>
                  >Logout</a
                >
              </li>
              
              <li class="u-nav-item">
                  <a
              href="user-cart.php"
              class=" u-image u-logo u-image-1"
              style="padding: 10px; margin-top:10px"
              data-image-width="381"
              data-image-height="419"
            >
              <img src="images/cart.png" class="u-logo-image u-logo-image-1" style="width: 30px;height: 30px;" />
            </a>
              </li>

              <li id="username" class="u-nav-item">
                  <a
              href="#"
              class=" u-image u-logo u-image-1"
              style="padding-top: 6px; margin-top:29px; color:#e95b19;"
              data-image-width="381"
              data-image-height="419"
            >
                User name
            </a>
              </li>
            </ul>

          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div
              class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav"
            >
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul
                  class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"
                >
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link" href="Home.php"
                      >home</a
                    >
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link" href="Our-Product.php"
                      >Our Products</a
                    >
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link" href="contact.php"
                      >Contact Us</a
                    >
                  </li>
                  <li id = "admin-nav2" class="u-nav-item">
                    <a class="u-nav-link u-button-style">Admin</a>
                    <div
                      class="u-nav-popup u-block-control u-block-bc8d-21"
                      data-block="64"
                    >
                      <ul
                        class="u-nav u-unstyled u-h-spacing-20 u-v-spacing-10 u-block-control u-block-bc8d-22"
                        data-block="65"
                      >
                        <li class="u-nav-item">
                          <a
                            class="u-nav-link u-button-style"
                            href="ProductList.php"
                            data-page-id="6139112"
                            >Products</a
                          >
                        </li>
                        <li class="u-nav-item">
                          <a
                            class="u-nav-link u-button-style"
                            href="User-List.php"
                            data-page-id="6139122"
                            >Users</a
                          >
                        </li>
                      </ul>
                    </div>
                  </li>
                
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link" href="login.php"
                   
                      >Logout</a
                    >
                  </li>
                  <li class="u-nav-item">
                  <a
              href="user-cart.php"
              class=" u-image u-logo u-image-1"
              style="padding: 10px; margin-top:10px"
              data-image-width="381"
              data-image-height="419"
            >
              <img src="images/cart.png" class="u-logo-image u-logo-image-1" style="width: 30px;height: 30px;" />
            </a>
              </li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        
        <a
          href="Home.php"
          class="u-align-left u-image u-logo u-image-1"
          data-image-width="481"
          data-image-height="519"
        >
          <img src="images/sweet.png" class="u-logo-image u-logo-image-1"  />
        </a>
      </div>
    </header>