<?php
session_start();
?>

 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
       <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
 </head>
 <body>
  <div class="">
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home
                     <span class="sr-only">(current)</span>
                    </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add_book.php">Upload</a>
                    </li>
                    <?php
                     if (isset($_SESSION['userId']))
                      {
                        echo '<li class="nav-item">
                      <a class="nav-link" href="update.php">Update/Delete</a>
                    </li>
                      ';
                      }
                      ?>
                    <li class="nav-item">
                       <a class="nav-link" href="search_book.php">Search</a>
                    </li>
                    <?php
                     if (!isset($_SESSION['userId']))
                      {
                        echo '<li class="nav-item">
                      <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                      ';
                      }
                    ?>
                    </ul>
                   <?php
                      if (isset($_SESSION['userId']))
                      {
                         echo ' <form action="includes/logout.inc.php" method="POST">
                            <button class="btn btn-danger"type="submit" name="logout-submit">Logout</button>
                          </form> ';
                       }
                       else
                        {
                           echo ' <form class="forminput" action="includes/login.inc.php" method="POST">
                         <input class="form-control" type="text" name="mailuid" placeholder="Username/Email...">
                         <input class="form-control" type="password" name="pwd" placeholder="Password...">
                         <button class="btn btn-info" type="submit" name="login-submit">Login</button>
                          
                   </form>';
                        }
                            ?>
                </div>
              </nav>
            </div>
<!--
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Adelmann Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_book.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Update/Delete</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Signup</a>
            </li>
            <form action="includes/login.inc.php" method="POST">
               <div >
                  <input class="form-control" type="text" name="mailuid" placeholder="Username/Email...">
                  <input class="form-control" type="password" name="pwd" placeholder="Password...">
                  <button class="btn btn-info" type="submit" name="login-submit">Login</button>
                </div>  
            </form>         
            <a href="signup.php">Signup</a>
            <form action="includes/logout.inc.php" method="POST">
              <button class="btn btn-danger"type="submit" name="logout-submit">Logout</button>
            </form>
          </ul>
        </div>
      </div>
    </nav>
  -->
 </body>
 </html>