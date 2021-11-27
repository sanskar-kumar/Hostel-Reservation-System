<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Merriweather&family=Merriweather+Sans&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        .font-50px a{
            font-size: 25px;
        }
        .x{
            position: relative;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
 <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <title>HOSTEL WORLD</title>
</head>

<body>
  
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- navigation bar -->
    <div class="navigation">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark navigations">
            <div class="container-fluid">
                <a class="navbar-brand" href="/project/index.php">HOSTEL WORLD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/project/index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/project/hostels.php">Hostels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project/myhostels.php">My Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/project/about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project/contact.php">Contact Us</a>
                        </li>
                        <?php
                        if($_SESSION['loggin']){
                            echo "</li>
                            <li class='nav-item'>
                       <a class='nav-link'href='index.php?logout='1''>LOGOUT</a>
                        </li>";
                        }
                        ?>
                    </ul>
                    <div class="d-flex">
                       <?php
                       if(!$_SESSION['loggin']){
                           echo '<a class="navbar-brand" href="login.php">
                           <img src="https://img.icons8.com/color/48/000000/user.png" alt="" width="30" height="24" class="d-inline-block align-text-top">User Login

                       </a>
                       <a class="navbar-brand" href="admin_login.php">
                           <img src="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-admin-network-technology-itim2101-lineal-color-itim2101-1.png" alt="" width="30" height="24" class="d-inline-block align-text-top">Admin
                           Login

                       </a>';
                       }
                       ?>
                   <?php  if (isset($_SESSION['username'])) : ?>
    	<p><img src="https://img.icons8.com/metro/26/000000/guest-male.png"><button class="btn btn-primary" type="submit"> <a href="myhostels.php" style="color: white; text-decoration:none"><?php echo $_SESSION['username']; ?></a></button> </p>
       <?php endif ?>
            
                </div>
        </nav>
    </div>
    <br>
    <br><br>
    <div class="container">
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Reservation Form</h3>
            <form method="POST">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label">Name</label>
                    <input type="text" name="Name" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                  <label for="birthdayDate" class="form-label">Birthday</label>
                    <input type="date" name="dob"class="form-control form-control-lg"id="birthdayDate"/>
                  </div>
                </div>
                
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="femaleGender"
                      value="female"
                      checked
                    />
                    <label class="form-check-label" for="female">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="maleGender"
                      value="male"
                    />
                    <label class="form-check-label" for="male">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="otherGender"
                      value="others"
                    />
                    <label class="form-check-label" for="other">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <label class="form-label" for="emailAddress">Email</label>
                    <input type="email" id="emailAddress"name="email" class="form-control form-control-lg" />
            
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" name="phoneno"class="form-control form-control-lg" />  
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-6">
                <label class="form-label select-label"> Category</label>
                  <select class="select form-control-lg"name="category_id">
                    <option value="1" disabled>--Choose One--</option>
                    <option value="1">Category A</option>
                    <option value="2">Category B</option>
                    <option value="3">Category C</option>
                  </select>
                </div>
                <div class="col-6">
                <label class="form-label select-label"> Room Type</label>
                  <select class="select form-control-lg"name="room">
                    <option value="1" disabled>--Choose One--</option>
                    <option value="1">Single BED</option>
                    <option value="2">Double Share</option>
                    <option value="3">Triple Share</option>
                  </select>
                </div>
              </div>

              <div class="mt-4 pt-2">
              <button type="submit"class="btn btn-primary btn-lg" name="submit">SEND</button>
              <button type="reset" class="btn btn-primary btn-lg"name="submit">RESET</button>
              </div>
              <?php
   include 'connection.php';
   $x = $_SESSION['username'];
   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$query1 = "SELECT * FROM student WHERE username='$x'";
$data1 = mysqli_query($conn, $query1);
$result1 = mysqli_fetch_assoc($data1);
$student_id = $result1['id'];

$hostel_id=$_GET['id'];
$query="SELECT * FROM hostels WHERE hostel_id='$hostel_id'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
$hostel_name=$result['hostel_name'];
$owner=$result['owner_id'];

   if(isset($_POST['submit'])){
    $sname=$_POST['Name'];
    $gender=$_POST['gender'];
    $birthday=$_POST['dob'];
    $email=$_POST['email'];
    $phone=$_POST['phoneno'];
    $category=$_POST['category_id'];
    $room=$_POST['room'];

    $query= "insert into reserve
    (name,gender,birthday,hostel_id,hostel_name,category_id,room_type,email,phoneno,student_id,owner_id) 
    values ('$sname','$gender','$birthday','$hostel_id','$hostel_name','$category','$room','$email','$phone','$student_id','$owner')";

    $run=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if($run)
    echo "Message sent successfully!!!!";
    else
    echo "Message not sent!!!!!";
   }
?>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>

    
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="footer">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color:rgb(209 20 80) ;">
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum repellat
                                quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam eum harum
                                corrupti dicta, aliquam sequi voluptate quas.
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

</body>

</html>





