<?php 
include "DB_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['confirm-password']) && isset($_POST['phone']) && isset($_POST['email'])){
        echo '<script>openForm();</script>';
        $uname = $_POST['username'];
        $usert = $_POST['user'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confirm = $_POST['confirm-password'];


        if($pass == $confirm){
            $sql = "SELECT * FROM users_tbl WHERE username='$uname' or email='$email' ";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $error_msg = "User already exists!";
            }
            else{
                $sql = "INSERT INTO users_tbl(name,user ,password, email, phone,username) VALUES(' $name','$usert','$pass', '$email', '$phone', '$uname')";
                        if($conn->query($sql)){
                            $info_msg = "User Regitered";
                            echo "    document.getElementById('admin-nav2').style.display = 'none';";
                           
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
<?php
include "header.php";
?>
<script>
  function deleteProduct(userId, userName) {
    var confirmation = window.confirm("Are you sure you want to delete the user: " + userName + "?");

    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "methods/delete_user.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        console.log('Sending XMLHttpRequest to methods/delete_user.php'); 
        xhr.send("userId=" + userId);
        return;
    } else {
        console.log('Deletion cancelled.');
    }
  }


  function updateProduct(id, username, name, email, phone, user,password) {
    
    console.log('here/////////////'+username);
    document.getElementById('myForm').style.display = 'block';
    document.getElementById('name').value = name;
    document.getElementById('user').value = user;
    document.getElementById('phone').value = phone;
    document.getElementById('email').value = email;
    document.getElementById('username').value = username;

    document.getElementById('password').value = password; 
    document.getElementById('uid').value = id; 
    // console.log('username: '+document.getElementById('username').value);
    console.log('Username value: ' + document.getElementById('username').value);

    var form = document.querySelector('form');
    form.setAttribute('action', 'methods/update_user.php');  
    
    var submitButton = form.querySelector('button[type=submit]');
    submitButton.textContent = 'Update User';
    
  }
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Responsive Products Dashboard</title>
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
    <meta name="generator" content="Nicepage 4.5.5, nicepage.com" />

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    
    </script>

    <script>
      function filterData() {
        console.log("lllllll");
        var searchInput = document.querySelector('.search-bar').value.toUpperCase();
        
        var userRows = document.querySelectorAll('.products-row');

        userRows.forEach(function(row) {
          var userName = row.querySelector('.product-cell.image span').textContent.toUpperCase();
          var unmae = row.querySelector('.product-cell.category span').textContent.toUpperCase();

          console.log(searchInput);
          console.log(unmae);
          if (userName.indexOf(searchInput) > -1 || unmae.indexOf(searchInput) > -1 ) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      }

      document.querySelector('.search-bar').addEventListener('input', filterData());
    </script>
  </head>
  <body data-path-to-root="./"
    data-include-products="false"
    class="u-body u-xl-mode"
    data-lang="en">

  
    <div class="app-container">
     
      <div class="app-content">
        <div class="app-content-header">
          <h2 class="app-content-headerText">Users</h2>
     
          <button class="app-content-headerButton" onclick="openForm()">
            Add User
          </button>
        </div>
        <div class="app-content-actions">
        <input class="search-bar" placeholder="Search..." type="text" onchange="filterData()"/>
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper" style="display: none">
              <button class="action-button filter jsFilter">
              
              </button>
             
            </div>
            <button class="action-button list active" title="List View">
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
            <button class="action-button grid" title="Grid View">
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

        <div class="products-area-wrapper tableView">
          <div class="products-header">
            <div class="product-cell image">
              username
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
            <div class="product-cell category">
              Name<button class="sort-button">
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
              Email<button class="sort-button">
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
              Phone<button class="sort-button">
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
            <div class="product-cell stock">
              Regdate<button class="sort-button">
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
              user<button class="sort-button">
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
          </div>
          <!--  /////////////////////////////-->
          <?php
            mysqli_set_charset($conn, "utf8");

            $query = "SELECT * FROM users_tbl;";
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
              <div class="product-cell image">
                <img src="images/sweet.png" alt="product" />
                <span></span><?php echo $row['username']; ?></span>
              </div>
              <div class="product-cell category">
                <span class="cell-label">Name:</span><?php echo $row['name']; ?>
              </div>
              <div class="product-cell status-cell">
                <span class="cell-label">Email:</span>
                <span class="status active"><?php echo $row['email']; ?></span>
              </div>
              <div class="product-cell sales">
                <span class="cell-label">Phone:</span><?php echo $row['phone']; ?>
              </div>
              <div class="product-cell stock">
                <span class="cell-label">Regdate:</span><?php echo $row['regdate']; ?>
              </div>
              <div class="product-cell price">
                <span class="cell-label">user:</span><?php echo $row['user']; ?>
              </div>

              <div class="product-cell price">
                   
                    <div class="product-cell"  onclick="updateProduct(
                      '<?php echo $row['id']; ?>', 
                      '<?php echo $row['username']; ?>',
                      '<?php echo $row['name']; ?>',
                      '<?php echo $row['email']; ?>',
                      '<?php echo $row['phone']; ?>',
                      '<?php echo $row['user']; ?>',
                      '<?php echo $row['password']; ?>'
                    )">
                      <span class="cell-label">Update:</span>
                      <svg class="update-icon" viewBox="0 0 24 24">
                        <path d="M12 2V22M4.93 11.08L4 17l5.92-.93M19.07 12.92L20 7l-5.92.93"/>
                      </svg>
                    </div>
                    <div class="product-cell sales" onclick="deleteProduct('<?php echo $row['id']; ?>','<?php echo $row['username']; ?>')">
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
    </div>
    <!-- ///////////////////////////////////////////////// -->
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
            action="User-List.php"
            method="POST"
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
            <label for="name" class="form-label">user</label>
              <select name="user" id="user"  required="" class="form-control form-icon-input">
                <option value="" style="color:gray;">--- Choose user type ---</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
              <!-- <label for="name" class="form-label">user</label>
              <input
                type="text"
                placeholder="Enter your Name"
                id="name"
                name="name"
                class="form-control form-icon-input"
                required=""
              /> -->
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
            
              <input
                type="hidden"
                placeholder="Enter your Email"
                id="uid"
                name="uid"
                class="form-control form-icon-input"
                required=""
              />
            <div class="u-form-group u-form-name">
              <label for="username" class="form-label">Username</label>
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
                <label class="form-label" for="password">Password</label
                ><input
                  class="form-control form-icon-input"
                  id="password"
                  type="text"
                  placeholder="Enter your Password"
                  name="password"
                />
              </div>
              <div class="col-xl-6">
                <label class="form-label" for="confirmPassword"
                  >Confirm Password</label
                ><input
                  class="form-control form-icon-input"
                  id="confirmPassword"
                  type="text"
                  placeholder="Confirm Password"
                  name="confirm-password"
                />
              </div>
            </div>
          

            <div class="u-align-left u-form-group u-form-submit">
              <button type="submit" class="btn btn-primary w-100 mb-3">
               Add New User
              </button>
            </div>
            <input type="hidden" value="" name="recaptchaResponse" />
          </form>
        </div>
      </section>

    </div>


    <script src="scriptss.js"></script>
  </body>
</html>
