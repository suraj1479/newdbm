<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    

    $existSql="SELECT * FROM `user2` WHERE username='$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);

    if($numExistRows>0)
    {
$showError="Username Already Exists";

    }

    elseif ($username=="") {
        # code...
        $showError="Username cannot be blank";
    }

    else{

        if(($password == $cpassword)){
            $sql = "INSERT INTO `user2` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }


    }
    
}
    
?>

<!doctype html>
<html lang="en">
  <head>

  <style>



  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body style="background-color:#c0ebe1;">
   
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4" style="width: 390px; border:1px solid black; padding:30px; background-color:#2b9489; color:white;" >
     <h4 class="text-center" style="padding:10px; margin-bottom:20px;">Signup to our website</h4>
     <form action="signup.php" method="post">
        <div class="form-group">
       <div class="col-xs-2">     <label for="username">Username</label></div>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" >Make sure to type the same password</small>
        </div>
         
        <button  style="margin-top:30px; margin-right:10px; " type="submit" class="btn btn-primary">SignUp</button>
        <button style="margin-top:30px;" type="login" class="btn btn-success" style="background-color:green;"><a style="color:white; text-decoration:none;"  href="login.php">Login</a></button>
        <button style="margin-top:30px;" type="close" class="btn btn-danger"><a style="color:white;  text-decoration:none;"  href="index1.php">Close</a></button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
