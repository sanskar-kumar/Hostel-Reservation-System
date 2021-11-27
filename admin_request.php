<?php
session_start();
$update=false;
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: admin_login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
$login = $_SESSION['loggin'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleabout.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Merriweather&family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #top_recom {
            font-family: 'Times New Roman', Times, serif;

        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .n {
            background-color: #D11450;
        }
    </style>

    <title>HOSTEL WORLD</title>
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark n">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_index.php">HOSTEL WORLD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <li><a class="nav-link" href="addhostels.php">ADD hostels</a></li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delhostel.php">Delete hostel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_request.php">Requests</a>
                    </li>
                    <?php
                    if ($login) {
                        echo "</li>
                            <li class='nav-item'>
                       <a class='nav-link'href='index.php?logout='1''>LOGOUT</a>
                        </li>";
                    }
                    ?>
                </ul>
                <div class="d-flex">
                    <?php
                    if (!$login) {
                        echo '<a class="navbar-brand" href="login.php">
                           <img src="https://img.icons8.com/color/48/000000/user.png" alt="" width="30" height="24" class="d-inline-block align-text-top">User Login

                       </a>
                       <a class="navbar-brand" href="admin_login.php">
                           <img src="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-admin-network-technology-itim2101-lineal-color-itim2101-1.png" alt="" width="30" height="24" class="d-inline-block align-text-top">Admin
                           Login

                       </a>';
                    }
                    ?>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <p><img src="https://img.icons8.com/metro/26/000000/guest-male.png"><button class="btn btn-primary" type="submit"> <a href="admin_index.php" style="color: white; text-decoration:none"><?php echo $_SESSION['username']; ?></a></button> </p>
                    <?php endif ?>

                </div>
            </div>
    </nav>
    <br><br><br><br><br>
    <?php
    if($update){
        echo "<div class='alert alert-success' role='alert'>
        Accepted successfully!!!!!
      </div>";
    }
    ?>

    <div class="container">
        
                <?php
                include("connection.php");
                $x = $_SESSION['username'];
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query1 = "SELECT * FROM owner WHERE username='$x'";
                $data1 = mysqli_query($conn, $query1);
                $result1 = mysqli_fetch_assoc($data1);
                $id = $result1['owner_id'];

                $query = "SELECT * FROM reserve where owner_id=$id";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);
                if ($total != 0) {
                    echo "<h1 id='top_recom'><i>LIST OF REQUESTS</i></h1><br>
                    </div>
                    <div class='container'>
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col'>Hostel ID</th>
                                    <th scope='col'>Hostel Name</th>
                                    <th scope='col'>Category</th>
                                    <th scope='col'>Room Type</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Contact Number</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Status</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($result = mysqli_fetch_assoc($data)) {
                        $id2 = $result['reference_id'];
                        $status = $result['registration_status'];
                        echo "
                    <tr>
                    <td>" . $result['hostel_id'] . "</td>
                    <td>" . $result['hostel_name'] . "</td>
                    <td>" . $result['category_id'] . "</td>
                    <td>" . $result['room_type'] . "</td>
                    <td>" . $result['name'] . "</td>
                    <td>" . $result['phoneno'] . "</td>
                    <td>" . $result['email'] . "</td>
                    <td>" . $result['registration_status'] . "</td>";
                    //!strcmp('Accepted','$status')
                        if (1 && $status!="Accepted") {
                   echo "<td><form method='POST' ><button class='btn btn-success' type='submit' name='submit' <input name='id2' type='hidden' value='$id2'>Accept</button></form></td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "NO RECORD FOUND!!!";
                }
                if (isset($_POST['submit'])) {
                    $sql = "UPDATE `reserve` SET `registration_status` = 'Accepted' WHERE `reserve`.`reference_id` = $id2";
                    $result4 = mysqli_query($conn, $sql);
                    if ($result4) {
                        $update = true;
                        
                    } else {
                        $update=false;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color: rgb(209 20 80);">
            <!-- Grid container -->
            <div class="container">
                <!-- Section: Links -->
                <section class="mt-5">
                    <!-- Grid row-->
                    <div class="row text-center d-flex justify-content-center pt-5">
                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="/project/about.php" class="text-white">About us</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="/project/hostels.php" class="text-white">Hostels</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white">Review</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="/project/contact.php" class="text-white">Help</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="/project/contact.php" class="text-white">Contact</a>
                            </h6>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row-->
                </section>
                <!-- Section: Links -->

                <hr class="my-5" />

                <!-- Section: Text -->
                <section class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam eum harum corrupti dicta, aliquam sequi voluptate quas.
                            </p>
                        </div>
                    </div>
                </section>
                <!-- Section: Text -->

                <!-- Section: Social -->
                <section class="text-center mb-5">

                    <a href="#" class="fa fa-facebook"></a>

                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>

                </section>
                <!-- Section: Social -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->
    <!-- <footer class="footer">
    <div class="container">
      <span class="text-muted">Copyright © semester 3 Nielsen Norman Group, All Rights Reserved.</span>
    </div>
  </footer> -->
</body>

</html>